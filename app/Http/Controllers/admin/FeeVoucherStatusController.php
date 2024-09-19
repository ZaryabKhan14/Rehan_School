<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeVocher;

class FeeVoucherStatusController extends Controller
{
    public function updateFeeStatus(Request $request ,$id){
        $fee = FeeVocher::find($id);
        if ($fee) {
            $fee->status = $request->input('status');

            $fee->save();

            return redirect()->back()->with('status', 'Fee status updated successfully');
        }
    }
}
