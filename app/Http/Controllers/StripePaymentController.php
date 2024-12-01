<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\View\View;
use App\Models\Order;
use App\Models\Schedules;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{

    public function stripeCheckout(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'customer_email' => Auth::user()->email,
            'payment_method_types' => ['card', 'link'],
            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price * 100,
                        'currency' => 'MYR',
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
        return redirect($response['url']);
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $session = $stripe->checkout->sessions->retrieve($request->session_id);

        if ($session->payment_status == 'paid') {
            $product = Product::find($session->metadata['product_id']);
            $orderStatus = ($product->type == 'Digital') ? 'Delivered' : 'Processing';
            $status = ($product->type == 'Digital') ? 1 : 0;
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'amount' => $session->amount_total,
                'payment_status' => 'Completed',
                'order_status' => $orderStatus,
                'status' => $status,
                'payment_method' => $session->payment_method_types[0],
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'branch_id' => 1,
                'title' => "A New Order has been placed",
                'message' => Auth::user()->name . " (" . Auth::user()->role . ") bought " . $product->name . " booked for " . $session->amount_total . " MYR.",
            ];
            $this->createNotification($data);
            return redirect()->route('order.my')->with('success', 'Your Order is Complete. Thank You!');
        }

        return redirect()->route('home')->with('error', 'Payment failed');
    }

    public function stripePayment(Request $request)
    {
        $scheduleId = $request->query('schedule_id');
        $schedule = DB::table('schedules')
            ->join('levels', 'schedules.level_id', '=', 'levels.id')
            ->join('subjects', 'schedules.subject_id', '=', 'subjects.id')
            ->join('users', 'schedules.student_id', '=', 'users.id')
            ->join('class_types', 'schedules.class_type_id', '=', 'class_types.id')
            ->where('schedules.id', $scheduleId)
            ->select(
                'schedules.*',
                'levels.name as level_name',
                'subjects.subject as subject_name',
                'users.name as student_name',
                'class_types.name as class_type_name',
                'users.email as email_student',
            )->first();

        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found');
        }

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $redirectUrl = route('stripe.class.payment') . '?session_id={CHECKOUT_SESSION_ID}';
        $description = "Class Type: {$schedule->class_type_name}\n" .
            "Quantity: {$schedule->qty} classes\n" .
            "Duration: {$schedule->minute} minutes each\n";
        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'customer_email' =>$schedule->email_student,
            'payment_method_types' => ['card', 'link'],
            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $schedule->level_name . " - " . $schedule->subject_name,
                            'description' => $description,
                        ],
                        'unit_amount' => $schedule->total_amount * 100,
                        'currency' => 'MYR',
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false,
            'metadata' => [
                'schedule_id' => $schedule->id,
                'amount_total' => $schedule->total_amount,
            ],
        ]);
        return redirect($response['url']);
    }
    public function stripeClassPayment(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        $branch_id = DB::table('schedules')
    ->where('id', $session->metadata['schedule_id'])
    ->value('branch_id'); 
        $schedule = DB::table('schedules')
            ->where('id', $session->metadata['schedule_id'])
            ->update([
        'payment_status' => 1,
        'payment_type' => "Stripe",
        ]);
        $data = [
            'user_id' => Auth::check() ?? Auth::user()->id,
            'branch_id' => $branch_id,
            'title' => "Strpe Class Payment Received",
            'message' => $session->student_name . "Student  pay Feee " . " booked for " . $session->amount_total . " MYR.",
        ];
        $this->createNotification($data);
        return redirect()->route('form.step4')->with('success', 'Your Payment Done. Thank You!');
    }
}
