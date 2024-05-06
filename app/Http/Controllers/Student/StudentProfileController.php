<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\StudentAuthNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class StudentProfileController extends Controller
{
    function __construct()
    {
        date_default_timezone_set("Asia/Dhaka");
    }

    function Profile(){
        $user = auth()->user();
        return $user;
    }
    function edit(){
        $this->data['user'] = auth()->user();

        return view('students.profile.edit', $this->data);
    }
    function edit_store(Request $request){
        $data = $request->validate([
            'name' => '',
            'bangla_name' => '',
            'email' => 'required',
            'father_name' => '',
            'mother_name' => '',
            'address' => '',
            'permanent_address' => '',
            'alt_phone' => '',
            'dob' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
        ]);

        $user = User::find(auth()->id());
        if($request->has('avatar_remove')){
            if($user->image){
                deleteImage('users', $user->image);
            }
            $data['image'] = null;
        }
        if($request->hasFile('image')){
            $data['image'] = createImage($request, 'users');
        }
        if($request->hasFile('signature')){
            $data['signature'] = createImage2($request, 'signature', 'users');
        }

        $user->update($data);
        return response()->json(['status' => true, 'msg' => 'Profile Updated Complete']);
    }
    function settings(){
        $this->data['user'] = Auth::user();
        return view('students.profile.settings', $this->data);
    }
    function change_phone(Request $request){
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);
        $user = User::find(auth()->id());
        $date = date('Y-m-d H:i:s');
        $date = strtotime($date);
        $date = strtotime("+3 minute", $date);
        $new_date=date('Y-m-d H:i:s', $date);
        $otp=rand(100000,999999);
        $data['otp_verify']=$otp;
        $data['exp_time']=$new_date;
        $data['phone']=$request->phone;

        if($user->phone == $request->phone && Hash::check($request->password, $user->password)) {
            $user->update([
                'phone' => $request->phone,
                'two_factor' => 0,
            ]);
            session()->put('user_data', $data);
            $msg='Your One-Time PIN is '.$otp.'. It will expire in 3 minutes.Visit pstu.student.com';
            session()->put('msg', $msg);
            return response()->json(['status' => true, 'msg' => 'Phone Number Changed Successfully!! Otp Sent. Please Check your phone to provide otp....', 'url' => route('student.otp')]);
        }
        return response()->json(['status' => false, 'msg' => 'Password Not Valid']);
    }
    function change_password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required | min:8 | confirmed',
        ]);
        $user = User::find(auth()->id());
        if(Hash::check($request->current_password, $user->password)){
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return response()->json(['status' => true, 'msg' => 'Password Changed Successfully']);
        }
        return response()->json(['status' => false, 'msg' => 'Password Not Valid']);
    }

    function security(){
        $this->data['user'] = User::find(auth()->id());
        return view('students.profile.security', $this->data);
    }

    function getOtp(){
        $user = User::find(auth()->id());
        $date = date('Y-m-d H:i:s');
        $date = strtotime($date);
        $date = strtotime("+3 minute", $date);
        $new_date=date('Y-m-d H:i:s', $date);
        $otp=rand(100000,999999);
        $data['otp_verify']=$otp;
        $data['exp_time']=$new_date;
        $data['phone']=$user->phone;
        session()->put('user_data', $data);
            $msg='Your One-Time PIN is '.$otp.'. It will expire in 3 minutes.Visit pstu.student.com';
            session()->put('msg', $msg);
            $data = 'We have sent SMS to your phone. Please Check and Provide';
            $html = view('students.profile.partials.otp_modal', compact('msg', 'data'))->render();

            return response()->json(['status' => true, 'html', $html]);
    }

    function enable_otp(Request $request){
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
                    $data = [
                        'message' => 'Your Two Step Authentication is Enabled',
                        'type' => 'Two Step Authentication',
                    ];
                    Notification::send(auth()->user(), new StudentAuthNotification($data));
                    $user->update([
                        'two_factor' => 1
                    ]);
                    return response()->json(['status' => true, 'msg' => 'Verified Success', 'url' => route('students.profile.security')]);
                }


    }
    function deactive_user(Request $request, $id){
        $user = User::find($id);
        if($request->has('deactivate')){
            $user->update([
                'status' => 0
            ]);
            Auth::logout();
            return redirect()->route('student.index')->with("success", 'Logout Successfully');
        }

        return response()->json(['status' => false, 'msg' => 'Your confirmation Must be Agree??']);
    }


}
