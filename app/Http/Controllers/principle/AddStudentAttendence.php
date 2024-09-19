<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAttendence;
use App\Models\StudentInformation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AddStudentAttendence extends Controller
{
    public function student_attendence_form(){
        $user = Auth::user();
        $campus = $user->campus;
        $student_attendence = StudentInformation::with('user')->where('campus',$campus)->get();
        return view('principle.add_student_attendence', compact('student_attendence'));
    }


    private function recordattendence($student_id,$status){
        $date =carbon::now()->toDateString();
        $day = carbon::now()->format('l');
        $existingAttendance = StudentAttendence::where('student_id', $student_id)
        ->where('date', $date)
        ->first();

        if ($existingAttendance) {
        return redirect()->back()->with('error', 'Attendance for today has already been recorded.');
        }

        $attendence= new StudentAttendence();
        $attendence->Student_id = $student_id;
        $attendence->Status = $status;
        $attendence->date = $date;
        $attendence->day = $day;
        $attendence->save();

    }

    public function mark_present_student($student_id){
        $result = $this->recordattendence($student_id, 'Present');
        
        if ($result) {
            return redirect()->back()->with('error', 'Attendance for today has already been recorded.');
        }
    
        return redirect()->back()->with('success', 'Marked as present.');
    }
    
    public function mark_absent_student($student_id){
        $result = $this->recordattendence($student_id, 'Absent');
        
        if ($result) {
            return redirect()->back()->with('error', 'Attendance for today has already been recorded.');
        }
    
        return redirect()->back()->with('success', 'Marked as absent.');
    }
}
