<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        return;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {   
        Log::info($cart);
        $products = $cart->products;

        return view('cart', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->products()->detach($request->productId);

        return back();
    }

    public function updateQuantity($quantity, $product) {
        $cart = Auth::user()->cart;

        $cart->products()->updateExistingPivot($product, ['quantity' => $quantity]);

        return;
    }
}
