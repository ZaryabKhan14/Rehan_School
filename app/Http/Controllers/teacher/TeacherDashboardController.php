<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TeacherDashboardController extends Controller
{
    public function teacher(){

        $user = Auth::user();
        $user_campus = $user->campus;

        $total_user = User::where('campus',$user_campus)->count();
        $total_students = User::where('role','student')->where('campus',$user_campus)->count();
        $total_teachers = User::where('role','teacher')->where('campus',$user_campus)->count();
        return view('teacher.teacher_dashboard',compact('total_user','total_students','total_teachers'));
    }
}
