<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionFreeze;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FreezeFormController extends Controller
{
    public function freeze_form(){
        $user = Auth::user();

        $userId = $user->id;
        $campus = $user->campus;
        $name = $user->name;

        return view('student.admission_freeze_form',compact('userId','campus','name'));
    }

    public function add_freeze_form_details(Request $request){
 
        $admission_freeze = new AdmissionFreeze();
        $admission_freeze->Student_id = $request->input('Student_id');
        $admission_freeze->name = $request->input('name');
        $admission_freeze->class = $request->input('class');
        $admission_freeze->campus = $request->input('campus');
        $admission_freeze->start_date = $request->input('start_date');
        $admission_freeze->end_date = $request->input('end_date');
        $admission_freeze->reason = $request->input('reason');
        $admission_freeze->save();
        return redirect()->route('student_dashboard');
    }
}
