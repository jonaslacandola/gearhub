<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $products = Auth::user()->cart->products;

        $lineItems = $products->map(function ($product) {
            return [
                'price_data' => [
                    'currency' => 'php',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->pivot->quantity,
            ];
        })->toArray();

        $session = Session::create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'metadata' => [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'success_url' => url('/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => route('cart.index'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request) {
        $session = $request->session;

        return view('success', compact('session'));
    }
}
