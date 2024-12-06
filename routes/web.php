<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsurePaymentSuccess;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stripe\Checkout\Session;
use Stripe\Stripe;

Route::get('/', function (Request $request) {
    $search = $request->input('search');
    $products = Product::where('name', 'like', "%$search%")->get();
    
    return view('feed', compact('products'));
})->name('feed');

Route::post('/checkout', [CheckoutController::class, 'store'])->middleware(['auth', 'verified'])->name('checkout');

Route::get('/success', [CheckoutController::class, 'success'])->middleware(['auth', 'verified', EnsurePaymentSuccess::class])->name('success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('product', ProductController::class)->middleware(['auth', 'verified']);

Route::resource('cart', CartController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
