<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import the Hash facade

class ShowUserController extends Controller
{
    public function show_admin(){
        $show_user = User::where('role','Admin')->get();
        return view('admin.show_user',compact('show_user'));
    }
    public function show_principle(){
        $show_user = User::where('role','principle')->get();
        return view('admin.show_user',compact('show_user'));
    }


    public function show_teacher(){
        $show_user = User::where('role','teacher')->get();
        return view('admin.show_user',compact('show_user'));
    }
    public function show_student_user(){
        $show_user = User::where('role','student')->get();
        return view('admin.show_user',compact('show_user'));
    }

    public function delete_user($id){
        $delete_user = User::find($id);
        if ($delete_user) {
            $delete_user->delete();
            session()->flash('success', 'User successfully deleted.');
    } else {
        session()->flash('error', 'User not found.');
    }
    return redirect()->back();
    }


    public function edit_user($id){
        $edit_user = User::find($id);
        return view('admin.edit_user',compact('edit_user'));
    }

    public function update_user(Request $request,$id){
        $update_user = User::find($id);
        if ($update_user) {
            $update_user->name = $request->input('name');
            $update_user->email = $request->input('email');
            if ($request->filled('password')) {
                $update_user->password = Hash::make($request->input('password'));
            }
            $update_user->role = $request->input('role');
            $update_user->update();
            session()->flash('success', 'User successfully updated.');
        } else {
            session()->flash('error', 'User not found.');
        }
            return redirect()->route('admin');
        }
        

        }
        
    
