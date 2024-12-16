<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Refund;
use Stripe\Stripe;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $orders = Auth::user()->orders;

        return view('order.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        return redirect()->route('order.show', $order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function cancel(Order $order)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $refund = Refund::create([
            'payment_intent' => $order->payment_intent,
        ]);

        $order->refund = $refund->id;
        $order->refund_status = $refund->status;
        $order->refund_reason = 'canceled';
        $order->refund_completed_at = date('Y-m-d H:i:s', $refund->created);
        $order->status = 'refunded';
        $order->save();

        return redirect()->route('order.show', $order);
    }
}
