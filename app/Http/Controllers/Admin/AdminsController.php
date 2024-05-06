<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ApproverRoles;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Admin::orderBy('id');
        if ($request->has('search') && $request->search !== '') {
            $query->where(function($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->search.'%')
                      ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                      ->orWhere('phone', 'LIKE', '%'.$request->search.'%');
            });
        }
        $this->data['roles'] = Role::all();
        $this->data['approver_roles'] = ApproverRoles::all();
        $this->data['users'] = $query->paginate(10);
        return view('admin.users.index', $this->data);
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
            'email' =>'required',
            'phone' =>'required',
            'password' =>'required | min:6',
            'role_id' => '',
        ]);
        $request->validate([
            'user_role'=>'required'
        ]);
        if($request->has('status')){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        $data['password'] = bcrypt($request->password);
        if($request->hasFile('image')){
            $data['image'] = createImage($request, 'admins');
        }
        $admin = Admin::create($data);
        $admin->assignRole($request->user_role);
        return response()->json(['status' => true, 'msg' => 'User Created Successfully']);
    }
    public function show(string $id)
    {
        $this->data['user'] = Admin::find($id);
        $html = view('admin.users.view', $this->data)->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    public function edit(string $id)
    {
        $this->data['user'] = Admin::find($id);
        $this->data['roles'] = Role::all();
        $this->data['approver_roles'] = ApproverRoles::all();
        $html = view('admin.users.edit', $this->data)->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    public function update(Request $request, string $id)
    {
        $admin = Admin::find($id);
        $data = $request->validate([
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'role_id' => '',
        ]);
        if($request->has('status')){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        $request->validate([
            'user_role'=>'required'
        ]);
        $data['password'] = bcrypt($request->password);
        if($request->hasFile('image')){
            $data['image'] = createImage($request, 'admins');
        }
        $admin->update($data);
        $admin->syncRoles($request->user_role);

        return response()->json(['status' => true, 'msg' => 'User Created Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Admin::find($id);
        if($data->image){
            deleteImage('admins', $data->image);
        }
        $data->delete();
        return response()->json(['status' => true, 'msg' => 'User Deleted Successfully']);
    }
    function deleteusers(Request $request){
        $users = $request->users;
        if(!$users){
            return response()->json(['status' => false, 'msg' => 'Please Select User First']);
        }
        foreach($users as $key => $item){
            $data = Admin::find($item);
            if($data->id == auth()->id()){

            }else{
                if($data->image){
                    deleteImage('admins', $data->image);
                }
                $data->delete();
            }
        }
        return response()->json(['status' => true, 'msg' => 'Selected Users Deleted Successfully']);
    }
}
