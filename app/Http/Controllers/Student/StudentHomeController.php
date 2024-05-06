<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Department;
use App\Models\Notification as ModelsNotification;
use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class StudentHomeController extends Controller
{
    function index(){
        $this->data['user'] = auth()->user();
        return view('students.dashboard.index', $this->data);
    }

    function notifications(){
        $this->data['user'] = auth()->user();
        return view('students.profile.notifications', $this->data);
    }

    function notifications_destroy($id){
        $item = ModelsNotification::find($id);
        $item->delete();
        return response()->json(['status' => true, 'msg' => 'Notification Deleted Successfully']);
    }
    function testimonialsCreate(){
        $this->data['departments'] = Department::all();
        $this->data['user'] = Auth::user();
        $this->data['degrees'] = Degree::all();
        $this->data['programs'] = Program::all();
        return view('students.testimonials.index', $this->data);
    }
    function testimonialsStore(Request $request){
        if(getCompletion(auth()->id()) != 100){
            return response()->json(['status' => false, 'msg' => 'You Must Have to Complete Your Profile First.....']);
        }
        $data = $request->validate([
            'first_enrollment' => 'required',
            'defense_semester' => 'required',
            'department_id' => 'required',
            'program_id' => 'required',
            'degree_id' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        Testimonial::create($data);
        return response()->json(['status' => true, 'msg' => 'Testimonial Application Successfully Applied']);
    }
    function testimonials(){
        $this->data['user'] = auth()->user();
        return view('students.testimonials.all', $this->data);
    }
    function testimonialsStatus($id){
        $this->data['item'] = Testimonial::find($id);
        
        return view('students.testimonials.status', $this->data);
    }
}
