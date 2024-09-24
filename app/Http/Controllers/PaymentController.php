<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Daily Ad Spend',
                ],
                'unit_amount' => $request->dailyAdSpend * 100, // Stripe requires amounts in cents
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',  // Changed from 'subscription' to 'payment'
        'success_url' => route('payment.success'),
        'cancel_url' => route('payment.cancel'),
        ]);

        return response()->json(['id' => $session->id]);
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
