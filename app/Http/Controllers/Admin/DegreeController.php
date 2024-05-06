<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApproverRoles;
use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = Degree::all();
        $this->data['roles'] = ApproverRoles::orderBy('order')->get();
        return view('admin.degree.index', $this->data);
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
            'name' => 'required',
            'code_name' => 'required',
        ]);
        if($request->has('accept_faculty')){
            $data['accept_faculty'] = 1;
        }else{
            $data['accept_faculty'] = 0;
        }
        if($request->has('accept_department')){
            $data['accept_department'] = 1;
        }else{
            $data['accept_department'] = 0;
        }
        $degree = Degree::create($data);
        $degree->approverRoles()->sync($request->roles);
        return response()->json(['status' => true, 'msg' => 'Degree Created Successfully']);
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Degree::find($id);
        $roles = ApproverRoles::orderBy('order')->get();
        $html = view('admin.degree.edit', compact('item', 'roles'))->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    public function update(Request $request, string $id)
    {
        $item = Degree::find($id);
        $data = $request->validate([
            'name' => 'required',
            'code_name' => 'required',
        ]);
        if($request->has('accept_faculty')){
            $data['accept_faculty'] = 1;
        }else{
            $data['accept_faculty'] = 0;
        }
        if($request->has('accept_department')){
            $data['accept_department'] = 1;
        }else{
            $data['accept_department'] = 0;
        }
        $item->update($data);

        $item->approverRoles()->sync($request->roles);

        return response()->json(['status' => true, 'msg' => 'Degree Updated Successfully']);
    }

    public function destroy(string $id)
    {
        $item = Degree::find($id);
        $item->approverRoles()->detach();
        $item->delete();
        return response()->json(['status' => true, 'msg' => 'Degree Deleted Successfully']);
    }
}
