<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;

class AdminStudentControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['students'] = User::all();
        return view('admin.students.index', $this->data);
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
        $data = $request->validate([
            'name' =>'required',
            'email' =>'',
            'registration_no' =>'required',
            'phone' =>'required',
            'nid' =>'required',
            'session' =>'',
        ]);
        if($request->hasFile('avatar')){
            $data['avatar'] = createImage2($request, 'avatar', 'students');
        }
        User::create($data);
        return response()->json(['status' => true, 'msg' => 'Student Created Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['user'] = User::find($id);
        $view = view('admin.students.view', $this->data)->render();
        return response()->json(['status' => true, 'html' => $view]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['user'] = User::find($id);
        $view = view('admin.students.edit', $this->data)->render();
        return response()->json(['status' => true, 'html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'name' =>'required',
            'email' =>'',
            'registration_no' =>'required',
            'phone' =>'required',
            'nid' =>'required',
            'session' =>'',
            'father_name' => '',
            'mother_name' => '',
            'address' => '',
            'dob' => '',
            'nationality' => '',
            'gender' => '',
        ]);
        if($request->hasFile('avatar')){
            $data['avatar'] = createImage2($request, 'avatar', 'students');
        }
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
        return response()->json(['status' => true, 'msg' => 'Student Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        if($data->image){
            deleteImage('users', $data->image);
        }
        if($data->signature){
            deleteImage('users', $data->signature);
        }
        $data->delete();
        return response()->json(['status' => true, 'msg' => 'Student Deleted Successfully']);
    }
    public function userImport(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        $import = new UsersImport();

        Excel::import($import, $request->file('file'));

        return response()->json(['status' => true, 'msg' => 'Student Data Importated Successfully', 'url' => route('admin.students.index')]);
    }
    public function deleteStudents(Request $request){
        $students = $request->students;
        if(!$students){
            return response()->json(['status' => false, 'msg' => 'Please Select Student First']);
        }
        foreach($students as $key => $item){
            $data = User::find($item);
            $data->delete();
        }
        return response()->json(['status' => true, 'msg' => 'Selected Students Deleted Successfully']);
    }
}
