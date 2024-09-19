<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payments;


class PaymentController extends Controller
{
    public function show_payment(){
        
        $showpayments = payments::all();
        return view('admin.show_payments',compact('showpayments'));
    }
}
