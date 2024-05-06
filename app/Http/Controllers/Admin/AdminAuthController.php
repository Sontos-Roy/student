<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\AuthNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function signup(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.signup');
    }
    function signup_store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $data['password'] = bcrypt($request->password);
        $admin = Admin::create($data);
        $admin->assignRole('admin');
        $admin->update([
            'last_login_at' => now(),
        ]);
        auth()->guard('admin')->loginUsingId($admin->id);
        return response()->json(['status' => true, 'data-kt-redirect-url' => route('admin.dashboard')]);
    }
    function login(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }
    function login_store(Request $request){
        $credentials = $request->only('email', 'password');
        $user = Admin::where('email', $request->email)->first();
        if($user && $user->status == 1){
            if (Auth::guard('admin')->attempt($credentials)) {
                \Log::info('User authenticated successfully');
                FacadesNotification::send(auth()->guard('admin')->user(), new AuthNotification());
                return response()->json(['status' => true, 'msg' => 'Successfully Login']);
            } else {
                \Log::warning('Authentication attempt failed');
            }
        } else {
            \Log::warning('User not found or inactive');
        }
        return response()->json(['status' => false, 'msg' => 'Something is Problem']);
    }
    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with("success", 'Logout Successfully');
    }
    public function index()
    {
        $this->data['students'] = User::all();
        $this->data['roles'] = ModelsRole::all();
        return view('admin.dashboard.dashboard', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
