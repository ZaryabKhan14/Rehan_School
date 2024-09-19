<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAttendence;
use Illuminate\Support\Facades\Auth;

class ShowStudentAttendenceController extends Controller
{
    public function show_student_attendence(Request $request){


        $selectedMonth = $request->input('month', carbon::now()->month);
        $selectedYear = $request->input('year',carbon::now()->year);
        

        $student_attendence = StudentAttendence::whereMonth('date',$selectedMonth)->whereYear('date',$selectedYear)->get();
        return view('admin.show_student_attendence',compact('student_attendence','selectedMonth','selectedYear'));
    }
}
