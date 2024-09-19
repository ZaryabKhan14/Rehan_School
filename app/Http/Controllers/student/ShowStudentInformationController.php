<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentInformation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ShowStudentInformationController extends Controller
{
    public function show_student_info(){

        $user = Auth::User();
        $information = StudentInformation::where('student_id',$user->id)->get();
        return view('student.show_student_information',compact('information','user'));
    }

}
