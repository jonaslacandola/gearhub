<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsurePaymentSuccess;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\map;

Route::get('/', function (Request $request) {
    $categories = Category::all();

    $search = $request->input('search');
    $filter = collect($request->all())->map(function ($value, $key) {
        if ($key != 'min_price' || $key != 'max_price') {
            return $value;
        }
    })->filter()->toArray();
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    $query = Product::query();

    if ($search) {
        $query->where('name', 'like', "%$search%");
    }

    if ($filter) {
        $query->whereIn('categoryId', $filter);
    }

    if ($minPrice) {
        $query->where('price', '>=', $minPrice);
    }

    if ($maxPrice) {
        $query->where('price', '<=', $maxPrice);
    }

    $products = $query->get();
    
    return view('feed', compact('products', 'categories', 'filter', 'minPrice', 'maxPrice'));
})->name('feed');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/success', [CheckoutController::class, 'success'])->middleware([EnsurePaymentSuccess::class])->name('success');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('product', ProductController::class)->middleware(['auth', 'verified']);

    Route::resource('order', OrderController::class)->middleware(['auth', 'verified']);
    Route::post('/order/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

    Route::controller(CartController::class)->group(function () {
        Route::post('/cart', 'store')->name('cart.store');
        Route::get('/cart/{cart}', 'show')->name('cart.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
