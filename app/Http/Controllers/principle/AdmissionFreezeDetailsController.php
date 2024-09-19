<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionFreeze;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdmissionFreezeDetailsController extends Controller
{
    public function showing_admission_freeze_detail(){
        $user = Auth::user();
        $campus = $user->campus;
        $show_freeze_details = AdmissionFreeze::where('campus',$campus)->get();
        return view('principle.showing_admission_freeze',compact('show_freeze_details'));
    }

    public function admission_freeze_statuss(Request $request,$id){
        $admission_freeze_status = AdmissionFreeze::find($id);
        if ($admission_freeze_status) {
            $admission_freeze_status->status = $request->input('status');

            $admission_freeze_status->save();

            return redirect()->back()->with('status', 'Admission Freeze Status update successfully');
        }
    }
}
