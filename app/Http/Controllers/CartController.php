<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cart = Auth::user()->cart;

        if (!$cart) {
            $cart = Cart::create([
                "userId" => Auth::id()
            ]);
        }

        $products = $cart->products;

        return view('cart', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productId' => 'required|string|exists:products,id',
            'quantity' => 'required|integer'
        ]);

        $cart = Auth::user()->cart;

        if (!$cart) {
            $cart = Cart::create([
                "userId" => Auth::id()
            ]);
        }

        $inCartProducts = $cart->products()->where('productId', $validated['productId'])->get();

        if (count($inCartProducts)) {
            $cart->products()->updateExistingPivot($validated['productId'], ['quantity' => $inCartProducts[0]->pivot->quantity + 1]);
        } else {
            $cart->products()->attach($validated['productId'], ['quantity' => $validated['quantity']]);
        }

        return back()->with('success', 'Product successfully added to cart!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function updateQuantityPivot($quantity, $product) {
        $cart = Auth::user()->cart;

        $cart->products()->updateExistingPivot($product, ['quantity' => $quantity]);
    }
}
