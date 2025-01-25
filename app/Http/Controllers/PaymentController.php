<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    //
    public function redirectToGateway(Request $request)
    {
        try {
            // Ensure the request has the required email and amount
            $request->validate([
                'email' => 'required|email',
                'amount' => 'required|integer|min:1',
            ]);

            // Add amount in kobo (Naira x 100)
            $request->merge([
                'amount' => $request->amount * 100
            ]);

            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // You can process the payment details here (e.g., save them to the database)
        if ($paymentDetails['status'] === true) {
            return redirect('/')->with('success', 'Payment successful!');
        }

        return redirect('/')->with('error', 'Payment failed. Please try again.');
    }
}
