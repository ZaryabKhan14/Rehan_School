<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException; // Import the exception class
use App\Models\payments;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('student.stripe');
    }

    public function stripePost(Request $request)
    {
        // Uncomment to see all the request data for debugging
        // dd($request->all());

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Validate request data
        $validatedData = $request->validate([
            'payment_method_id' => 'required|string',
            'student_id' => 'required|string',
            'student_name' => 'required|string',
            'student_campus' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        try {
            // Create a PaymentIntent with the retrieved payment method
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount * 100, // Convert amount to cents
                'currency' => 'usd', // Use a supported currency
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'automatic',
                'confirm' => true,
                'description' => 'Payment for student: ' . $request->student_campus . ' - ' . $request->student_name . ' (ID: ' . $request->student_id . ')',
                'return_url' => secure_url('paymentReturn'),
            ]);

            // Store payment details in session
            session()->put('student_id', $request->student_id);
            session()->put('student_name', $request->student_name);
            session()->put('amount', $request->amount);
            session()->put('student_campus', $request->student_campus);
            session()->put('payment_date', now()); 


            $payment_details_store = new payments();
            $payment_details_store->student_id = $request->student_id;
            $payment_details_store->student_name = $request->student_name;
            $payment_details_store->student_campus = $request->student_campus;
            $payment_details_store->amount = $request->amount;
            $payment_details_store->payment_date = now();
            $payment_details_store->stripe_payment_id = $paymentIntent->id;;
            $payment_details_store->payment_status = $paymentIntent->status;
            $payment_details_store->save();

            // Handle payment status
            $status = $paymentIntent->status;

            if ($status === 'requires_action' || $status === 'requires_source_action') {
                return response()->json([
                    'status' => 'requires_action',
                    'client_secret' => $paymentIntent->client_secret
                ]);
            }

            // Payment succeeded
            return response()->json([
                'status' => 'succeeded',
                'paymentIntent' => $paymentIntent
            ]);

        } catch (ApiErrorException $e) {
            // Payment failed
            session()->flash('error', 'Payment failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'failed',
                'message' => 'Payment failed: ' . $e->getMessage()
            ]);
        }
    }

    // Add this method to handle the payment return
    public function paymentReturn()
    {
        session()->flash('success', 'Payment was successful!');
        return view('student.payment-return'); // Adjust this to your desired view
    }
}
