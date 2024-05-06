<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\StudentAuthNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class StudentAuthController extends Controller
{
    function __construct()
    {
        date_default_timezone_set("Asia/Dhaka");
    }
    function index(){
        return view('welcome');
    }
    function login(Request $request){
        $credentials = $request->only('phone', 'password');
        $user = User::where('phone', $request->phone)->first();
        if($user->register_verified == 1){
            if($user->two_factor == 0){
                if (Auth::attempt($credentials)) {
                    Notification::send(auth()->user(), new StudentAuthNotification());
                    return response()->json(['status' => true, 'msg' => 'Login Successful!!', 'url' => route('students.dashboard')]);
                }
            }else{
                $phone = $request->phone;
                $user = User::where('phone', $phone)->first();
                if($user && $user->register_verified == 1){
                    $date = date('Y-m-d H:i:s');
                    $date = strtotime($date);
                    $date = strtotime("+3 minute", $date);
                    $new_date=date('Y-m-d H:i:s', $date);
                    $otp=rand(100000,999999);
                    $data['otp_verify']=$otp;
                    $data['exp_time']=$new_date;
                    $data['phone']=$phone;
                    session()->put('user_data', $data);
                    $msg='Your One-Time PIN is '.$otp.'. It will expire in 3 minutes.Visit pstu.student.com';
                    session()->put('msg', $msg);

                    return response()->json(['status' => true, 'msg' => 'Otp Send to your phone. Please check and Provide....', 'url' => route('student.two.factor.login')]);
                }
                return response()->json(['status' => true, 'msg' => 'Please Provide Valid Phone Number']);
            }
        }
        return response()->json(['status' => false, 'msg' => 'Credential Error!!!']);
    }
    function register(){
        return view('students.auth.register');
    }
    function register_store(Request $request){
        $date = date('Y-m-d H:i:s');
        $date = strtotime($date);
        $date = strtotime("+3 minute", $date);
        $new_date=date('Y-m-d H:i:s', $date);
        $otp=rand(100000,999999);
        $request->validate([
            'registration_no' => 'required',
            'nid' => 'required',
        ]);
        $user = User::where('registration_no', $request->registration_no)
            ->where('nid', $request->nid)
            ->first();
        if (!$user) {
            return response()->json(['status' => false, 'msg' => 'Invalid credentials']);
        }
        $data['otp_verify']=$otp;
        $data['exp_time']=$new_date;
        $data['phone']=$user->phone;
        session()->put('user_data', $data);
        $msg='Your One-Time PIN is '.$otp.'. It will expire in 3 minutes.Visit pstu.student.com';
        session()->put('msg', $msg);
      	$url=route('student.otp');
        //   return redirect()->route('student.otp')->with('success', 'Otp Sent. Please Check your phone to provide otp....');
        return response()->json(['status' => true, 'Otp Sent. Please Check your phone to provide otp....', 'url' => $url]);
    }
    function otp(){
        $this->data['user'] = session()->get('user_data');
        $this->data['msg'] = session()->get('msg');
        if(!$this->data['user'] && !$this->data['msg']){
                return redirect()->route('student.register');
        }
        return view('students.auth.otp', $this->data);
    }
    function otp_store(Request $request){
            $user_data=session()->get('user_data');
            if(empty($user_data)){
                return redirect()->route('student.register');
            }
                $exp_date = date('Y-m-d H:i:s');
                $request->validate([
                    'otp' => 'required',
                ]);
                if($user_data['otp_verify'] != $request->otp){
                    return response()->json(['status' => false, 'msg' => 'PIN Is Not Match. please try again !']);
                }
                if($user_data['exp_time'] < $exp_date){
                    return response()->json(['status' => false, 'msg' => 'Time Is Expired', 'url' => route('student.register')]);
                }
                $user=User::where('phone', $user_data['phone'])->first();
                if($user){
                    Auth::loginUsingId($user->id);
                    session()->put('user_data',[]);
                    Notification::send(auth()->user(), new StudentAuthNotification());
                    $user->update([
                        'last_login_at' => now(),
                        'password' => ''
                    ]);
                    return response()->json(['status' => true, 'msg' => 'Verified Success', 'url' => route('students.dashboard')]);
                }
    }
    function resend(){
        $date = date('Y-m-d H:i:s');
        $date = strtotime($date);
        $date = strtotime("+3 minute", $date);
        $new_date=date('Y-m-d H:i:s', $date);
        $otp=rand(100000,999999);

        $data['otp_verify']=$otp;
        $data['exp_time']=$new_date;
        $data['phone']=session()->get('user_data')['phone'];

        session()->put('user_data', $data);
        $msg='Your One-Time PIN is '.$otp.'. It will expire in 3 minutes.Visit pstu.student.com';
        session()->put('msg', $msg);

        return redirect()->route('student.otp')->with('success', 'Otp Sent. Please Check your phone to provide otp....');
    }

    function password(){
        if(auth()->user()->password == null || ''){
            return redirect()->route('students.dashboard');
        }
        return view('students.auth.password');
    }

    function password_store(Request $request){
        $data = $request->validate([
            'password' => 'required | min:8 | confirmed'
        ]);
        $data['password'] = bcrypt($request->password);

        auth()->user()->update([
            'password' => $data['password'],
            'register_verified' => 1,
        ]);
        return response()->json(['status' => true, 'msg'  => 'Your Password Set Successfully', 'url' => route('students.dashboard')]);
    }
    function logout(){
        Auth::logout();
        return redirect()->route('student.index')->with("success", 'Logout Successfully');
    }
    function forget_password(){
        return view('students.auth.forget_password');
    }
    function forget_password_store(Request $request){
        $phone = $request->phone;
        $user = User::where('phone', $phone)->first();
        if($user && $user->register_verified == 1){
            $date = date('Y-m-d H:i:s');
            $date = strtotime($date);
            $date = strtotime("+3 minute", $date);
            $new_date=date('Y-m-d H:i:s', $date);
            $otp=rand(100000,999999);
            $data['otp_verify']=$otp;
            $data['exp_time']=$new_date;
            $data['phone']=$phone;
            session()->put('user_data', $data);
            $msg='Your One-Time PIN is '.$otp.'. It will expire in 3 minutes.Visit pstu.student.com';
            session()->put('msg', $msg);

            return response()->json(['status' => true, 'msg' => 'Otp Send to your phone. Please check and Provide....', 'url' => route('student.otp')]);
        }
        return response()->json(['status' => true, 'msg' => 'Please Provide Valid Phone Number']);
    }
    function forget_password_otp(){
        $this->data['user'] = session()->get('user_data');
        $this->data['msg'] = session()->get('msg');
        if(!$this->data['user'] && !$this->data['msg']){
                return redirect()->route('student.register');
        }
        return view('students.auth.otp', $this->data);
    }
    function two_factor_login(){
        $this->data['user'] = session()->get('user_data');
        $this->data['msg'] = session()->get('msg');
        if(!$this->data['user'] && !$this->data['msg']){
                return redirect()->route('student.register');
        }
        return view('students.auth.twofactor', $this->data);
    }
    function two_factor_login_store(Request $request){
        $user_data=session()->get('user_data');
            if(empty($user_data)){
                return redirect()->route('student.register');
            }
                $exp_date = date('Y-m-d H:i:s');
                $request->validate([
                    'otp' => 'required',
                ]);
                if($user_data['otp_verify'] != $request->otp){
                    return response()->json(['status' => false, 'msg' => 'PIN Is Not Match. please try again !']);
                }
                if($user_data['exp_time'] < $exp_date){
                    return response()->json(['status' => false, 'msg' => 'Time Is Expired', 'url' => route('student.register')]);
                }
                $user=User::where('phone', $user_data['phone'])->first();
                if($user){
                    Auth::loginUsingId($user->id);
                    session()->put('user_data',[]);
                    Notification::send(auth()->user(), new StudentAuthNotification());
                    $user->update([
                        'last_login_at' => now()
                    ]);
                    return response()->json(['status' => true, 'msg' => 'Verified Success', 'url' => route('students.dashboard')]);
                }
    }
}
