<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fee;
use Illuminate\Support\Facades\Auth;
class FeeStudentController extends Controller
{
    public function admin_Student_fee(){
        $fetch_user_details = User::where('role','student')->get();
        return view('admin.student_fee_option',compact('fetch_user_details'));
    }


    public function add_student_form_admin($id){
        $fetch_user_details = User::find($id);
        return view('admin.student_fee_form',compact('fetch_user_details'));
    }


    public function add_student_fee_admin(Request $request){
        $add_student_fee = new Fee();

        $add_student_fee->student_id = $request->input('student_id');
        $add_student_fee->student_name = $request->input('name');
        $add_student_fee->fees_amount = $request->input('amount');
        $add_student_fee->student_campus = $request->input('campus');
        $add_student_fee->save();

        return redirect()->route('admin')->with('success', 'User added successfully');

    }
}
