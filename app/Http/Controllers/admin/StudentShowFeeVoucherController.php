<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeVocher;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentShowFeeVoucherController extends Controller
{
    public function showing_student_fee_voucher(){
        $fetch_user_fee = FeeVocher::all()->groupBy('student_id');
        return view('admin.show_student_fee_voucher',compact('fetch_user_fee'));
    }

    public function fee_voucher_downloadPDF($student_id)
    {
        $fees = FeeVocher::where('student_id', $student_id)->get();
    
        if ($fees->isNotEmpty()) {
            $pdf = PDF::loadView('admin.fee_voucher_pdf', [
                'fees' => $fees,
                'student_id' => $student_id
            ]);
            return $pdf->download('fee_voucher_' . $student_id . '.pdf');
        }
    
        return redirect()->back()->with('error', 'Fee voucher not found.');
    }
    
}
