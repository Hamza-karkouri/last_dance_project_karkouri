<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showPaymentPage()
    {
        return view('payment.pay');
    }

    public function createPaymentSession($plan)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $prices = [
            'free' => 0,
            'premium' => 3000,
            'premium_plus' => 18000,
        ];

        $price = $prices[$plan] ?? 0;

        if ($price == 0) {
            $this->updateUserPlan($plan);
            return redirect()->route('payment.success', ['plan' => $plan]);
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => ucfirst($plan) . ' Plan',
                        ],
                        'unit_amount' => $price,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['plan' => $plan]),
            'cancel_url' => route('payment.cancel'),
            'metadata' => [
                'user_id' => Auth::user()->id,
                'plan' => $plan,
            ],
        ]);

        return redirect($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        $plan = $request->input('plan');
        $user = Auth::user();

        if ($user) {
            $user->plan = $plan;
            $user->save();
        }

        return view('payment.success', ['plan' => $plan]);
    }

    public function paymentCancel()
    {
        return view('payment.cancel');
    }

    protected function updateUserPlan($plan)
    {
        $user = Auth::user();
        if ($user) {
            $user->plan = $plan;
            $user->save();
        }
    }
}
