<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\Auth;

class ShowingUserController extends Controller
{
    public function principle_show_teacher(){
        $user = Auth::user();
        $campus = $user->campus;
        $show_user = User::where('role', 'teacher')
        ->where('campus', $campus)
        ->get();
        return view('principle.user_show',compact('show_user'));
    }
    public function principle_show_student_user(){
        $user = Auth::user();
        $campus = $user->campus;
        $show_user = User::where('role', 'student')
                    ->where('campus', $campus)
                    ->get();
        return view('principle.user_show',compact('show_user'));
    }

    public function principle_delete_user($id){
        $delete_user = User::find($id);
        if ($delete_user) {
            $delete_user->delete();
            session()->flash('success', 'User successfully deleted.');
    } else {
        session()->flash('error', 'User not found.');
    }
    return redirect()->back();
    }


    public function principle_edit_user($id){
        $edit_user = User::find($id);
        return view('principle.user_edit_form',compact('edit_user'));
    }

    public function principle_update_user(Request $request,$id){
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
            return redirect()->route('principle');
        }
}
