<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function createPaymentSession(Request $request) {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Lead Package',
                    ],
                    'unit_amount' => $request->totalBudget * 100, // Total budget from the calculator
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
    
        return redirect()->away($session->url);
    }

    public function success()
    {
        return inertia('PaymentSuccess');
    }

    public function cancel()
    {
        return inertia('PaymentCancel');
    }
}
