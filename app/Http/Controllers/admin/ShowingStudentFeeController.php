<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fee;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ShowingStudentFeeController extends Controller
{
    public function show_student_fee_admin(){
        $fetch_student_fees = Fee::all();
        return view('admin.show_student_fee',compact('fetch_student_fees'));
        
    }
}
