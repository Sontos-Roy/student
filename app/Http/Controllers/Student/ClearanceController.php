<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ApproverRoles;
use App\Models\Clearance;
use App\Models\Degree;
use App\Models\Payment;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = Degree::all();
        $this->data['programs'] = Program::all();
        $html = view('students.clearence.add', $this->data)->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = session()->get('data');
        $this->data['degree'] = Degree::find($data['degree_id']);
        $this->data['program'] = Program::find($data['program_id']);
        $this->data['faculties'] = getFaculties();
        $this->data['halls'] = getHalls();
        $this->data['departments'] = getDepartments();
        if(session()->get('data')){
            return view('students.clearence.index', $this->data);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $degree = Degree::find($request->degree_id);
        $clearence = Clearance::where('user_id', auth()->id())->first();
        if($clearence){
            return response()->json(['status' => false, 'msg' => 'You Have Already Applied.....']);
        }
        $f_required = $degree->accept_faculty ? 'required' : '';
        $d_required = $degree->accept_department ? 'required' : '';

        // Validate request data
        $data = $request->validate([
            'faculty_id' => $f_required,
            'department_id' => $d_required,
            'hall_id' => '',
            'internship_title' => '',
            'degree_id' => 'required',
            'program_id' => 'required',
            'attach_no' => 'required',
        ]);
        try {
            $data['user_id'] = auth()->id();
            $data['status'] = 'applied';
            $item = Clearance::create($data);
            $roles = $item->degree ? $item->degree->approverRoles : [];
            $hall = $request->hall_id;
            foreach ($roles as $role) {
                if(!$hall && $role->id != 1){
                    $approv[] = [
                        'clearance_id' => $item->id,
                        'approver_role_id' => $role->id,
                        'admin_id' => null,
                        'status' => 0,
                        'approved_at' => null,
                    ];
                }elseif($hall && $role->id == 1){
                    continue;
                }else{
                    $approv[] = [
                        'clearance_id' => $item->id,
                        'approver_role_id' => $role->id,
                        'admin_id' => null,
                        'status' => 0,
                        'approved_at' => null,
                    ];
                }
            }
            $item->clearanceApprovers()->createMany($approv);
            return response()->json(['status' => true, 'msg' => 'Successfully Applied']);
        } catch (\Throwable $th) {
            $item->delete();
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }

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
    function get_store(Request $request){
        session()->forget('data');
        $data['degree_id'] = $request->degree_id;
        $data['program_id'] = $request->program_id;
        session()->put('data', $data);
        return response()->json(['status' => true, 'msg' => 'Success', 'url' => route('students.clearence.create')]);
    }

    function status(){
        $item = Clearance::where('user_id', auth()->id())->first();
        $this->data['roles'] = ApproverRoles::orderBy('order')->get();
        $this->data['user'] = $item->currentApprover && $item->currentApprover->Approve_role->order == $item->improve+1 ? $item->currentApprover : '';
        $this->data['clearence'] = $item;
        $this->data['pay'] = Payment::where('user_id',$item->user_id)->where('admin_id', $item->currentApprover->id)->first();
        return view('students.clearence.status', $this->data);
    }
}
