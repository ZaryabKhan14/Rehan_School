<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FeeVocher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Add this line

class FeeVoucherController extends Controller
{   
    public function fee_voucher(Request $request){
        $request->validate([
            'student_id' => 'required|string',
            'student_name' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'month' => 'required|integer|min:1|max:12',
            'amount' => 'required|numeric|min:0',
        ]);
        Log::info('Fee Voucher Data:', $request->all());

        $generate_fee_voucher = new FeeVocher();

        $generate_fee_voucher->student_id = $request->input('student_id');
        $generate_fee_voucher->student_name = $request->input('student_name');
        $generate_fee_voucher->student_campus = $request->input('student_campus');
        $generate_fee_voucher->year = $request->input('year');
        $generate_fee_voucher->month = $request->input('month');
        $generate_fee_voucher->amount = $request->input('amount');
        $generate_fee_voucher->status = 'Pending'; // Default status
        $generate_fee_voucher->generated_at = now();

        $generate_fee_voucher->save();

        return redirect()->back()->with('success', 'Fee voucher generated successfully');
    }
}
