<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Degree;
use App\Models\Department;
use App\Models\Program;
use App\Models\ProvisionalCertificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvisionalCertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard('admin')->user();
        $query = ProvisionalCertificate::latest();
        if($user->hasRole('dean')){
            $query->where('dean_id', $user->id);
        }
        if($user->hasRole('Chairman')){
            $query->where('chairman_id', $user->id);
        }
        $this->data['items'] = $query->paginate(25);
        return view('admin.provisional_certificates.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['departments'] = Department::all();
        $this->data['users'] = User::all();
        $this->data['user'] = Auth::user();
        $this->data['degrees'] = Degree::all();
        $this->data['programs'] = Program::all();
        return view('admin.provisional_certificates.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(getCompletion($request->user_id) != 100){
            return response()->json(['status' => false, 'msg' => 'Not Completed Profile...']);
        }
        $data = $request->validate([
            'first_enrollment' => 'required',
            'defense_semester' => 'required',
            'department_id' => 'required',
            'program_id' => 'required',
            'degree_id' => 'required',
            'user_id' => 'required',
        ]);
        ProvisionalCertificate::create($data);
        return response()->json(['status' => true, 'msg' => 'Provisional Certificate Application Successfully Applied']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item= ProvisionalCertificate::find($id);
        $this->data['users'] = Admin::all();
        $this->data['item'] = $item;
        $this->data['user'] = $item->user;
        return view('admin.provisional_certificates.details', $this->data);
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
        $item = ProvisionalCertificate::find($id);
        $item->delete();
        return response()->json(['status' => true, 'msg' => 'Provisional Certificate Deleted Successfully']);
    }
    function assign_super_visor(Request $request){
        $id = $request->id;
        $request->validate([
            'supervisor_id' => 'required'
        ]);
        $item = ProvisionalCertificate::find($id);
        $item->update([
            'supervisor_id' => $request->supervisor_id
        ]);
        return response()->json(['status' => true,'msg' => 'Assigned Done']);
    }
    function assign_chairman(Request $request){
        $id = $request->id;
        $request->validate([
            'chairman_id' => 'required'
        ]);
        $item = ProvisionalCertificate::find($id);
        $item->update([
            'chairman_id' => $request->chairman_id
        ]);
        return response()->json(['status' => true,'msg' => 'Assigned Done']);
    }
    function assign_dean(Request $request){
        $id = $request->id;
        $request->validate([
            'dean_id' => 'required'
        ]);
        $item = ProvisionalCertificate::find($id);
        $item->update([
            'dean_id' => $request->dean_id
        ]);
        return response()->json(['status' => true,'msg' => 'Assigned Done']);
    }
    function approve_super_visor(Request $request){
        $id = $request->id;
        $request->validate([
            'supervisor_approve' => ''
        ]);
        $item = ProvisionalCertificate::find($id);
        $item->update([
            'supervisor_approve' => $request->supervisor_approve
        ]);
        return response()->json(['status' => true,'msg' => 'Approve Done']);
    }
    function approve_chairman(Request $request){
        $id = $request->id;
        $request->validate([
            'chairman_approve' => ''
        ]);
        $item = ProvisionalCertificate::find($id);
        $item->update([
            'chairman_approve' => $request->chairman_approve
        ]);
        return response()->json(['status' => true,'msg' => 'Approve Done']);
    }
    function approve_dean(Request $request){
        $id = $request->id;
        $request->validate([
            'dean_approve' => ''
        ]);
        $item = ProvisionalCertificate::find($id);
        $item->update([
            'dean_approve' => $request->dean_approve
        ]);
        return response()->json(['status' => true,'msg' => 'Approve Done']);
    }
}
