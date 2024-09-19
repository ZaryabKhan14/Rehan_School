<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAddController extends Controller
{
    public function principle_adding_user_form(){
        $user = Auth::user();
        $campus = $user->campus;
        $user_campus = User::where('campus',$campus)->first();
        return view("principle.adding_user",compact('user_campus'));
    }

    public function principle_add_user(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);


        $add_user = new User();
        $add_user->name = $request->input('name');
        $add_user->email = $request->input('email');
        $add_user->password = $request->input('password');
        $add_user->role = $request->input('role');
        $add_user->campus = $request->input('campus');
        $add_user->save();
        return redirect()->route('principle')->with('success', 'User added successfully');

    }
}
