<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = Program::all();
        return view('admin.program.index', $this->data);
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
            'title' => 'required',
            'code' => 'required',
        ]);
        if($request->has('cgpa_status')){
            $data['cgpa_status'] = 1;
        }else{
            $data['cgpa_status'] = 0;
        }
        if($request->has('exam_date_status')){
            $data['exam_date_status'] = 1;
        }else{
            $data['exam_date_status'] = 0;
        }
        if($request->has('defense_semester_status')){
            $data['defense_semester_status'] = 1;
        }else{
            $data['defense_semester_status'] = 0;
        }

        Program::create($data);

        return response()->json(['status' => true, 'msg' => 'Program Created Successfully']);
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
        $item = Program::find($id);
        $html = view('admin.program.edit', compact('item'))->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    public function update(Request $request, string $id)
    {
        $item = Program::find($id);
        $data = $request->validate([
            'title' => 'required',
            'code' => 'required',
        ]);
        if($request->has('cgpa_status')){
            $data['cgpa_status'] = 1;
        }else{
            $data['cgpa_status'] = 0;
        }
        if($request->has('exam_date_status')){
            $data['exam_date_status'] = 1;
        }else{
            $data['exam_date_status'] = 0;
        }
        if($request->has('defense_semester_status')){
            $data['defense_semester_status'] = 1;
        }else{
            $data['defense_semester_status'] = 0;
        }
        $item->update($data);

        return response()->json(['status' => true, 'msg' => 'Program Updated Successfully']);
    }

    public function destroy(string $id)
    {
        $item = Program::find($id);
        $item->delete();
        return response()->json(['status' => true, 'msg' => 'Program Deleted Successfully']);
    }
}
