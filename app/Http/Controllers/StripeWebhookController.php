<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\User;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Retrieve the raw body of the request
        $payload = $request->getContent();

        // Get the Stripe signature from the header
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');  // You can find this in the Stripe Dashboard

        try {
            // Verify the webhook signature
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );

            // Handle the event
            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object;  // Contains the session object
                    $this->updateUserPlan($session);
                    break;
                // You can add more cases for other events like payment failed, etc.
            }

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    private function updateUserPlan($session)
    {
        // Get the user ID from the session metadata (if you passed it when creating the session)
        $userId = $session->metadata->user_id;

        // Get the plan from the session
        $plan = $session->metadata->plan;

        // Update the user's plan in the database
        $user = User::find($userId);
        if ($user) {
            $user->plan = $plan;  // Set the user's plan to the one they paid for
            $user->save();
        }
    }
}
