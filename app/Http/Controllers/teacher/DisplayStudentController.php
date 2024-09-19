<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DisplayStudentController extends Controller
{
    public function show_student(){
        $user = Auth::user();
        $campus = $user->campus;
        $show_student = User::where('role', 'student')
        ->where('campus', $campus)
        ->get();
        return view('teacher.show_student',compact('show_student'));
    }
}
