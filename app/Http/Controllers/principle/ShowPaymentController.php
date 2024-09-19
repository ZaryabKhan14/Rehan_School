<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ShowPaymentController extends Controller
{
        public function showing_payments(){
        $user = Auth::User();
        $user_campus = $user->campus;
        $user_role = $user->role;  // Retrieve the role of the user

        // Check if the user's role is 'principle'
        if ($user_role === 'principle') {
            $showpayments = payments::where('student_campus', $user_campus)->get();     
            return view('principle.payment_show', compact('showpayments'));
        } else {
            // Handle the case where the user is not a 'principle'
            // For example, you could return an error view or redirect
            return redirect()->route('redirect')->with('error', 'Access denied');
        }

    }
}
