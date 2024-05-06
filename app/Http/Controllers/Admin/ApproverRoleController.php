<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApproverRoles;
use Illuminate\Http\Request;

class ApproverRoleController extends Controller
{
    function index(){
        $this->data['items'] = ApproverRoles::orderBy('order')->get();
        return view('admin.approver_roles.index', $this->data);
    }

    function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'order' => 'required',
        ]);

        ApproverRoles::create($data);
        return response()->json(['status' => true, 'msg' => 'Role Created Successfully']);
    }
    function edit($id){
        $this->data['item'] = ApproverRoles::find($id);
        $html = view('admin.approver_roles.edit', $this->data)->render();
        return response()->json(['status' => true, 'html' => $html]);
    }
    function update(Request $request, $id){
        $item = ApproverRoles::find($id);
        $data = $request->validate([
            'name' => 'required',
            'order' => 'required',
        ]);

        $item->update($data);
        return response()->json(['status' => true, 'msg' => 'Role Updated Successfully']);
    }
    function destroy($id){
        $item = ApproverRoles::find($id);
        $item->delete();
        return response()->json(['status' => true, 'msg' => 'Role Deleted Successfully']);
    }
}
