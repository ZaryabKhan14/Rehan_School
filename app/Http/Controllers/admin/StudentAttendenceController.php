<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAttendence;
use App\Models\StudentInformation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
    


class StudentAttendenceController extends Controller
{
    public function student_attendences() {
        $student_attendence = StudentInformation::whereHas('user', function($query) {
            $query->where('role', 'Student');
        })->with('user')->get();
        
        return view('admin.student_attendence', compact('student_attendence'));
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

    public function markpresent($student_id){
        $result = $this->recordattendence($student_id, 'Present');
        
        if ($result) {
            return redirect()->back()->with('error', 'Attendance for today has already been recorded.');
        }
    
        return redirect()->back()->with('success', 'Marked as present.');
    }
    
    public function markabsent($student_id){
        $result = $this->recordattendence($student_id, 'Absent');
        
        if ($result) {
            return redirect()->back()->with('error', 'Attendance for today has already been recorded.');
        }
    
        return redirect()->back()->with('success', 'Marked as absent.');
    }
}
