<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\View\View;
use App\Models\Order;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{

    public function stripeCheckout(Request $request)
    {
        // Find the product being purchased
        $product = Product::findOrFail($request->id);
        // Initialize Stripe client
        $stripe = new StripeClient(env('STRIPE_SECRET'));


        // Define the success and cancel URLs
        $redirectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';
        // $cancelUrl = route('stripe.checkout.cancel');

        // Create the Stripe checkout session
        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            // 'cancel_url' => $cancelUrl,
            'customer_email' => Auth::user()->email,
            'payment_method_types' => ['card', 'link'],
            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price * 100,
                        'currency' => 'USD',
                    ],
                    'quantity' => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'metadata' => [
                'product_id' => $product->id,
            ],
        ]);

        // Redirect to Stripe's checkout page
        return redirect($response['url']);
    }

public function stripeCheckoutSuccess(Request $request)
{
    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

    // Retrieve the checkout session by session_id
    $session = $stripe->checkout->sessions->retrieve($request->session_id);

    if ($session->payment_status == 'paid') {
        // Get product information from the metadata
        $product = Product::find($session->metadata['product_id']);

        // Create the order in the database
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'amount' => $session->amount_total,
            'payment_status' => 'completed',
            'payment_method' => $session->payment_method_types[0],
        ]);


        return redirect()->route('order.index')->with('success', 'Your Order is Complete. Thank You!');
    }

    return redirect()->route('home')->with('error', 'Payment failed');
}

}