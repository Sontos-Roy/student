<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ApproverRoles;
use App\Models\Clearance;
use App\Models\ClearanceApprover;
use App\Models\Degree;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Program;
use App\Models\User;
use App\Notifications\ClearanceNotification;
use App\Notifications\PaymentNotification;
use App\Notifications\StudentAuthNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['degreeis'] = Degree::all();
        $this->data['programs'] = Program::all();
        $query = Clearance::latest();
        $admin = auth('admin')->user();
        if (!$admin->hasRole('admin')) {
            $query->whereHas('clearanceApprovers', function ($query) use ($admin) {
                $query->where('approver_role_id', $admin->role_id);
            });
        }
        $this->data['items'] = $query->paginate(30);
        return view('admin.clearance.index', $this->data);
    }
    function getClearance($query){

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
        $this->data['users'] = User::orderBy('name')->get();
        $this->data['departments'] = getDepartments();
        if(session()->get('data')){
            return view('admin.clearance.create', $this->data);
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
            'user_id' => 'required',
            'hall_id' => '',
            'internship_title' => '',
            'degree_id' => 'required',
            'program_id' => 'required',
            'attach_no' => 'required',
        ]);
        try {
            $data['status'] = 'applied';
            $item = Clearance::create($data);
            $roles = $item->degree ? $item->degree->approverRoles : [];
            foreach ($roles as $role) {
                $approv[] = [
                    'clearance_id' => $item->id,
                    'approver_role_id' => $role->id,
                    'admin_id' => null,
                    'status' => 0,
                    'approved_at' => null,
                ];
            }
            $item->clearanceApprovers()->createMany($approv);
            return response()->json(['status' => true, 'msg' => 'Successfully Applied', 'url' => route('admin.clearance.index')]);
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
        $item = Clearance::find($id);
        $appro = $item->clearanceApprovers->where('status', 0);
        $query = Admin::orderBy('id');
        $admin = auth('admin')->user();
        $roleIds = [];
        foreach ($appro as $approver) {
            $roleId = $approver->approver_role_id;
            if (!in_array($roleId, $roleIds)) {
                $roleIds[] = $roleId;
            }
        }
        $admins = Admin::whereIn('role_id', $roleIds);
        $this->data['users'] = $admins->get();
        $this->data['roles'] = $appro;
        $this->data['items'] = $query->paginate(30);
        $this->data['pay'] = Payment::where('user_id',$item->user_id)->where('admin_id', $admin->id)->first();
        $this->data['item'] = $item;
        $this->data['user'] = $item->user;
        return view('admin.clearance.details.details', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Clearance::find($id);
        $this->data['degree'] = Degree::find($item->degree_id);
        $this->data['item'] = $item;
        $this->data['faculties'] = Faculty::all();
        $this->data['departments'] = Department::all();
        $this->data['halls'] = Hall::all();
        $html = view('admin.clearance.edit', $this->data)->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $degree = Degree::find($request->degree_id);
        if($degree->accept_faculty == 1){
            $f_required = 'required';
        }else{
            $f_required = '';
        }
        if($degree->accept_department == 1){
            $d_required = 'required';
        }else{
            $d_required = '';
        }
        $data = $request->validate([
            'faculty_id' => $f_required,
            'department_id' => $d_required,
            'hall_id' => '',
            'internship_title' => '',
            'degree_id' => 'required',
            'attach_no' => 'required',
        ]);
        $item = Clearance::find($id);
        $item->update($data);
        return response()->json(['status' => true, 'msg' => 'Clearance Updated Successful']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Clearance::find($id);
        if($item->user){
            $data = [
                'message' => 'Your Clearance is Deleted From '. auth('admin')->user()->name,
                'type' => 'Clearance'
            ];
            FacadesNotification::send($item->user, new ClearanceNotification($data));
        }
        if($item->clearanceApprovers){
            $item->clearanceApprovers()->delete();
        }
        $item->delete();
        return response()->json(['status' => true, 'msg' => 'Clearance Deleted Successful']);
    }
    function getDegree(Request $request){
        session()->forget('data');
        $data['degree_id'] = $request->degree_id;
        $data['program_id'] = $request->program_id;
        session()->put('data', $data);
        return response()->json(['status' => true, 'msg' => 'Success', 'url' => route('admin.clearance.create')]);
    }
    function getApprove2(Request $request, $id){
        $clearance = Clearance::findOrFail($id);
        $user = Auth::guard('admin')->user();
        if($user && $clearance){
            if($clearance->current_approver_id == $user->id){
                if($request->has('improve')){
                    $clearance->update([
                        'improve' => $user->approve_role->order
                    ]);
                    $notification = [
                        'for' =>  $request->for,
                        'message' => 'Successfully Approved you Clearance from',
                        'from' => $request->from,
                        'type' => 'Clearance'
                    ];
                    FacadesNotification::send($clearance->user, new PaymentNotification($notification));
                    return response()->json(['status' => true, 'msg' => 'Clearance Approved Successful']);
                }else{
                    return response()->json(['status' => false, 'msg' => 'There Is not Way to Reject After Payment Verified is Successful']);
                }
            }
        }
        return response()->json(['status' => false, 'msg' => 'Something is wrong !!!']);
    }
    function getCurrentApprover($id){
        $item = Clearance::find($id);
        $roles = ApproverRoles::orderBy('order')->get();
        if($roles->last()->order == $item->improve){
             $status = "approved";
        }else{
            $status = "applied";
        }
        $item->update([
            'current_approver_id' => Auth::guard('admin')->id(),
            'status' => $status
        ]);
        return response()->json(['status' => true]);
    }
    function checkApprove($id){
        $item = Clearance::find($id);
        $this->data['roles'] = ApproverRoles::orderBy('order')->get();
        $this->data['user'] = $item->currentApprover && $item->currentApprover->Approve_role->order == $item->improve+1 ? $item->currentApprover : '';
        $this->data['clearence'] = $item;
        return view('admin.clearance.details.status', $this->data);
    }
    public function getApprove(Request $request, $id)
    {
        try {
            $application = Clearance::find($id);
            $countap = $application->clearanceApprovers->where('status', 0);
            if($countap->count() == 0){
                return response()->json(['status' => false, 'msg' => 'No Body has to approve!!']);
            }
            $admin = auth('admin')->user();
            if (!$this->isAdminAuthorized($admin, $application)) {
                return response()->json(['status' => false, 'msg' => 'Unauthorized Action..']);
            }
            if($request->has('approve')){
                $app = ClearanceApprover::where('clearance_id', $id)->where('approver_role_id', $request->approver_role_id)->first();
                if($app->status == 1){
                    return response()->json(['status' => false, 'msg' => 'Already Approved!!']);
                }
                $app->update([
                    'admin_id' => $request->admin_id,
                    'approved_at' => now(),
                    'status' => 1
                ]);
                $application = Clearance::find($id);
                $countap = $application->clearanceApprovers->where('status', 0);
                if($countap->count() == 0){
                    $application->update([
                        'status' => 'approved'
                    ]);
                }
                $notification = [
                    'for' =>  'Approve',
                    'message' => 'Successfully Approved your Clearance form',
                    'from' => $app->approverRole->name,
                    'type' => 'Clearance'
                ];
                FacadesNotification::send($application->user, new PaymentNotification($notification));
                return response()->json(['status' => true, 'msg' => 'Approved Successfully']);
            }else{
                return response()->json(['status' => false, 'msg' => 'Approved Faild']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    private function isAdminAuthorized($admin, $application)
    {
        if ($admin->hasRole('admin')) {
            return true;
        } else {
            $adminRoleId = $admin->approve_role->id;
            $approverRoles = $application->clearanceApprovers->pluck('approver_role_id')->toArray();
            return in_array($adminRoleId, $approverRoles);
        }
    }

    function rolewishadmins(){
        $id = request()->id;
        $users = Admin::where('role_id', $id)->get();
        return response()->json($users);
    }
}
