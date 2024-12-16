<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $summary = []; $count = 0; $subTotal = 0;
        $products = Auth::user()->cart->products;
        
        $summary = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'description' => $product->description,
                'category' => $product->category->name,
                'images' => json_decode($product->images),
                'totalPrice' => $product->price * $product->pivot->quantity,
            ];
        });
        $subTotal = array_reduce($products->toArray(), function ($ctr, $itm) {
            return $ctr += $itm['price'] * $itm['pivot']['quantity'];
        }, 0);
        $count = count($products);

        return view('checkout.index', compact('summary', 'count', 'subTotal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        Stripe::setApiKey(config('services.stripe.secret'));

        $validated = $request->validate([
            'payment_method' => 'required|string',
        ]);
        
        try {
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
                'payment_method_types' => [$validated['payment_method']],
                'line_items' => $lineItems,
                'customer_email' => Auth::user()->email,
                'shipping_address_collection' => [
                    'allowed_countries' => ['PH'],
                ],
                'shipping_options' => [
                    [
                        'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => [
                                'amount' => 5800, // Example shipping cost in cents
                                'currency' => 'php',
                            ],
                            'display_name' => 'Standard Shipping',
                            'delivery_estimate' => [
                                'minimum' => ['unit' => 'business_day', 'value' => 3],
                                'maximum' => ['unit' => 'business_day', 'value' => 7],
                            ],
                        ],
                    ],
                ],
                'success_url' => url('/success?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => back()->getTargetUrl(),
            ]);
    
            return redirect($session->url);
        } catch (ApiErrorException $e) {
            Log::error($e->getMessage());
        }
    }

    public function success(Request $request) {
        $cart = Auth::user()->cart;
        $session = $request->session;
        
        $order = Order::where('payment_intent', $session->payment_intent)->first();

        if ($order) {
            return view('checkout.success', compact('order'));
        }

        $order = Order::create([
            'userId' => Auth::id(),
            'total' => $session->amount_total,
            'status' => $session->status,
            'payment_intent' => $session->payment_intent,
            'payment_status' => $session->payment_status,
            'payment_method' => $session->payment_method_types[0],
            'name' => $session->shipping_details->name,
            'email' => $session->customer_email,
            'address' => $session->shipping_details->address->line1 . ' ' . $session->shipping_details->address->line2,
            'city' => $session->shipping_details->address->city,
            'country' => $session->shipping_details->address->country,
            'refund_status' => '',
            'refund_reason' => '',
        ]);

        $order->products()->attach(
            $cart->products->mapWithKeys(function ($product) {
                return [$product->id => ['quantity' => $product->pivot->quantity]];
        })->toArray());
        
        $cart->products()->detach();

        return view('checkout.success', compact('order'));
    }
}
