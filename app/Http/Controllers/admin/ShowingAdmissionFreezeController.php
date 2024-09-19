<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionFreeze;

class ShowingAdmissionFreezeController extends Controller
{
    public function show_admission_freeze_detail(){
        $show_freeze_details = AdmissionFreeze::all();
        return view('admin.show_admission_freeze',compact('show_freeze_details'));
    }

    public function admission_freeze_status(Request $request,$id){
        $admission_freeze_status = AdmissionFreeze::find($id);
        if ($admission_freeze_status) {
            $admission_freeze_status->status = $request->input('status');

            $admission_freeze_status->save();

            return redirect()->back()->with('status', 'Admission Freeze Status update successfully');
        }
    }
}
