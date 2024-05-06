<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    function index(){
        $query = Permission::orderBy('name');
        if(request('search')){
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }
        $this->data['items'] = $query->get();
        return view('admin.roles.permissions', $this->data);
    }

    function store(Request $request){
        $data = $request->validate([
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required'
        ]);
        $data['guard_name'] = 'admin';
        Permission::create($data);

        return response()->json(['status' => true, 'msg' => 'Permission Created Successfully']);
    }
    function edit($id){
        $item = Permission::find($id);

        $html = view('admin.roles.edit_permissions', compact('item'))->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    function update(Request $request, $id){
        $data = $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        $item = Permission::find($id);
        $item->update($data);

        return response()->json(['status' => true, 'msg' => 'Permission Updated Successfully']);
    }

    function destroy($id){
        $item = Permission::find($id);

        $item->delete();
        return response()->json(['status' => true, 'msg' => 'Permission Deleted Successfully']);
    }
}
