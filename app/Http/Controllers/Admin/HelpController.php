<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = Help::latest()->get();
        return view('admin.help.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['helps'] = Help::where('user_id', auth()->id())->latest()->get();
        return view('students.help', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'summary' => 'required',
            'brief' => 'required',
            'user_id' => 'required',
        ]);
        Help::create($data);
        return response()->json(['status' => true, 'msg' => 'Your Completed Sent Successfully!!!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = Help::find($id);
        $html = view('admin.help.view', $this->data)->render();
        return response()->json(['status'=> true, 'html' => $html]);
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
