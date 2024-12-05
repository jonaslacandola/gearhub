<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Stripe\Checkout\Session;
use Stripe\Stripe;

Route::get('/', function (Request $request) {
    $search = $request->input('search');
    $products = Product::where('name', 'like', "%$search%")->get();
    
    return view('feed', compact('products'));
})->name('feed');

Route::post('/checkout', function () {
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
        'success_url' => route('feed'),
        'cancel_url' => route('cart.index'),
    ]);

    Log::info('session', [$session]);

    return redirect($session->url);
    
})->middleware(['auth', 'verified'])->name('checkout');

Route::resource('product', ProductController::class)->middleware(['auth', 'verified']);

Route::resource('cart', CartController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
