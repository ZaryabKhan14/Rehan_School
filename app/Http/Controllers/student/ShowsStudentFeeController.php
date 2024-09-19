<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeVocher;
use Illuminate\Support\Facades\Auth;

class ShowsStudentFeeController extends Controller
{
    public function student_fee()
    {
        $user = Auth::user();
        $fees = FeeVocher::where('student_id', $user->id)->get();

        // Convert month number to month name
        $fees->transform(function ($fee) {
            $fee->month = $this->getMonthName($fee->month);
            return $fee;
        });

        $totalPendingFees = $fees->where('status', 'Pending')->sum('amount');


        return view('student.show_student_fee', compact('fees', 'totalPendingFees'));
    }

    private function getMonthName($monthNumber)
    {
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        return $months[$monthNumber] ?? 'Unknown';
    }
}
