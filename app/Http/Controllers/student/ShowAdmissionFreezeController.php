<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionFreeze;
use Illuminate\Support\Facades\Auth;

class ShowAdmissionFreezeController extends Controller
{
    public function show_admission_freeze_details(){
        $user = Auth::user();
        $show_freeze_details = AdmissionFreeze::where('student_id',$user->id)->first();
        return view('student.show_admission_freeze',compact('show_freeze_details'));
    }
}
