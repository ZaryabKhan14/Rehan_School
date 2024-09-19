<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AddStudentController extends Controller
{
    public function student_form(){
        $user = AUth::user();
        $campus = $user->campus;
        $user_campus = User::where('campus',$campus)->first();
        return view("teacher.add_student",compact('user_campus'));
    }

    public function add_student_form(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        
        $add_user = new User();
        $add_user->name = $request->input('name');
        $add_user->email = $request->input('email');
        $add_user->password = $request->input('password');
        $add_user->role = $request->input('role');
        $add_user->save();
        return redirect()->route('student_form')->with('success', 'User added successfully');

    }
}
