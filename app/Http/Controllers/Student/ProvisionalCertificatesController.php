<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Program;
use App\Models\ProvisionalCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvisionalCertificatesController extends Controller
{
    function index(){
        $this->data['items'] = Program::all();
        $html = view('students.provisional_certificates.add', $this->data)->render();
        return response()->json(['status' => true, 'html' => $html]);
    }
    public function create()
    {
        $degree = session()->get('program');
        $this->data['degree'] = Program::find($degree);
        $this->data['faculties'] = getFaculties();
        $this->data['halls'] = getHalls();
        $this->data['user'] = Auth::user();
        $this->data['departments'] = getDepartments();
        // dd($this->data['degree']);
        if(session()->get('program')){
            return view('students.provisional_certificates.index', $this->data);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $degree = Program::find($request->program_id);
        $clearence = ProvisionalCertificate::where('user_id', auth()->id())->first();
        if($clearence){
            return response()->json(['status' => false, 'msg' => 'You Have Already Applied.....']);
        }
        if($degree->cgpa_status == 1){
            $cgpa_required = 'required';
        }else{
            $cgpa_required = '';
        }
        if($degree->exam_date_status == 1){
            $exam_date_status = 'required||date_format:Y-m';
        }else{
            $exam_date_status = 'nullable';
        }
        if($degree->defense_semester_status == 1){
            $defense_semester_status = 'required';
        }else{
            $defense_semester_status = '';
        }
        $data = $request->validate([
            'department_id' => 'required',
            'dissertation_title' => 'required',
            'first_enrollment' => 'required',
            'exam_date' => $exam_date_status,
            'defense_semester' => $defense_semester_status,
            'cgpa' => $cgpa_required,
            'program_id' => 'required',
            'date_pub_compiled_result' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        ProvisionalCertificate::create($data);
        return response()->json(['status' => true, 'msg' => 'Successfully Applied']);
    }
    public function get_store(Request $request){
        $request->validate([
            'program_id' => 'required'
        ]);
        session()->put('program', $request->program_id);
        return response()->json(['status' => true, 'msg' => 'Success', 'url' => route('students.provisional.create')]);
    }
}
