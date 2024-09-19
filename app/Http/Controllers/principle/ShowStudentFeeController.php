<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fee;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ShowStudentFeeController extends Controller
{
    public function show_student_fee(){
        $user = Auth::User();
        $user_campus = $user->campus;
        $fetch_student_fees = Fee::where('student_campus',$user_campus)->get();
        return view('principle.show_student_fee',compact('fetch_student_fees'));
        
    }
}
