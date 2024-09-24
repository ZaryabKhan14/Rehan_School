<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeVocher;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;

class ShowFeeVoucherController extends Controller
{
    public function show_student_fee_voucher(){
        $user = Auth::user();
        $campus = $user->campus;
        $fetch_user_fee = FeeVocher::where('student_campus',$campus)->get()->groupBy('student_id');
        return view('principle.show_student_fee_voucher',compact('fetch_user_fee'));
    }

    public function downloadPDF($id)
    {
        $user = Auth::user();
        $campus = $user->campus;
        $fee = FeeVocher::where('student_campus', $campus)->find($id);

        if ($fee) {
            $pdf = PDF::loadView('principle.fee_voucher_pdf', compact('fee'));
            return $pdf->download('fee_voucher_' . $fee->student_id . '.pdf');
        }

        return redirect()->back()->with('error', 'Fee voucher not found.');
    }
}
