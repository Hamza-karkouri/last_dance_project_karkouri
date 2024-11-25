<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        // Set the Stripe Secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function checkout($plan)
    {
        // Get the price ID based on the selected plan
        $priceId = null;
        switch ($plan) {
            case 'premium':
                $priceId = 'price_1Hh1Gw2eZvKYlo2CPJlsJkW0';  // Replace with your Stripe Premium price ID
                break;
            case 'premium_plus':
                $priceId = 'price_1Hh1Gw2eZvKYlo2CPJlsJkX1';  // Replace with your Stripe Premium+ price ID
                break;
            case 'free':
            default:
                $priceId = 'price_1Hh1Gw2eZvKYlo2CPJlsJkY2';  // Replace with your Stripe Free price ID (if needed)
                break;
        }

        // Create a Checkout session
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price' => $priceId,
                    'quantity' => 1,
                ],
            ],
            'mode' => 'subscription',  // This ensures it's a subscription
            'success_url' => route('subscription.success'),
            'cancel_url' => route('subscription.cancel'),
            'client_reference_id' => Auth::user()->id,  // Associate the checkout session with the current user
            'metadata' => [
                'plan' => $plan,  // Store the selected plan
            ],
        ]);

        return redirect($checkoutSession->url);
    }

    public function success()
    {
        return view('subscription.success');
    }

    public function cancel()
    {
        return view('subscription.cancel');
    }

    public function webhook(Request $request)
    {
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');
        $sig_header = $request->header('Stripe-Signature');
        $payload = $request->getContent();

        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpointSecret);

            if ($event->type === 'checkout.session.completed') {
                $session = $event->data->object;
                $this->updateUserPlan($session);
            }

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    private function updateUserPlan($session)
    {
        // Update the user plan in the database based on the session metadata
        $user = User::find($session->client_reference_id);
        $user->plan = $session->metadata->plan;
        $user->save();
    }
}
