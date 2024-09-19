<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAttendence;
use App\Models\StudentInformation;
use App\Models\User;
use Carbon\Carbon;
class AddStudentAttendenceController extends Controller
{
    public function student_attendence(){
        $student_attendence = StudentInformation::with('user')->get();
        return view('teacher.add_student_attendence', compact('student_attendence'));
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

    public function mark_present($student_id){
        $result = $this->recordattendence($student_id, 'Present');
        
        if ($result) {
            return redirect()->back()->with('error', 'Attendance for today has already been recorded.');
        }
    
        return redirect()->back()->with('success', 'Marked as present.');
    }
    
    public function mark_absent($student_id){
        $result = $this->recordattendence($student_id, 'Absent');
        
        if ($result) {
            return redirect()->back()->with('error', 'Attendance for today has already been recorded.');
        }
    
        return redirect()->back()->with('success', 'Marked as absent.');
    }
}
