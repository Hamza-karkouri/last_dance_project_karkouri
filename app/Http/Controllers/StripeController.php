<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    // Show the payment plans page
    public function showPaymentPage()
    {
        return view('payment.pay');
    }

    // Handle the Stripe payment for selected plan
    public function startPayment($plan)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Define prices for each plan
        $prices = [
            'free' => 0, // Free plan, no charge
            'premium' => 3000, // $30.00 in cents
            'premium_plus' => 18000, // $180.00 in cents
        ];

        // Get the price for the selected plan
        $price = $prices[$plan] ?? 0;

        // If price is zero, it means it's a free plan, so we don't create a Stripe session
        if ($price == 0) {
            return redirect()->route('payment.success', ['plan' => $plan]);
        }

        // Create a Stripe Checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => ucfirst($plan) . ' Plan', // Dynamic plan name
                        ],
                        'unit_amount' => $price, // The price for the selected plan
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['plan' => $plan]),
            'cancel_url' => route('payment.cancel'),
        ]);

        // Redirect to Stripe Checkout page
        return redirect($session->url);
    }
}
