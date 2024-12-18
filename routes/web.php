<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsurePaymentSuccess;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $categories = Category::all();

    $search = $request->input('search');
    
    $filter = collect($request->all())->except(['min_price', 'max_price', 'search'])->filter()->toArray();

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
    
    Route::get('/admin', function () {
        return redirect()->route('admin.overview');
    })->name('admin');

    Route::get('/admin/overview', function () {
        $users = User::all()->count();
        $products = Product::all()->count();
        $sales = Order::where('status', 'complete')->count();
        $revenue = Order::where('status', 'complete')->sum('total') / 100;
        $refunds = Order::where('status', 'refunded')->count();
        $sales_return = Order::where('status', 'refunded')->sum('total') / 100;

        $categories = Category::all();
        $revenuePerCategory = [];

        foreach ($categories as $category) {
            $categoryRevenue = Order::where('status', 'complete')
                ->whereHas('products', function ($query) use ($category) {
                    $query->where('categoryId', $category->id);
                })
                ->get()
                ->reduce(function ($total, $order) use ($category) {
                    $categoryTotal = $order->products
                        ->where('categoryId', $category->id)
                        ->sum(function ($product) {
                            return $product->price * $product->pivot->quantity; 
                        });
                    return $total + $categoryTotal;
                }, 0);
        
            $revenuePerCategory[$category->name] = $categoryRevenue;
        }

        Log::info($revenuePerCategory);

        return view('admin.overview', compact('users', 'products', 'sales', 'revenue', 'refunds', 'sales_return', 'revenuePerCategory'));
    })->name('admin.overview');
    
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/product', 'index')->name('admin.product.index'); // Display a listing of the resource.
        Route::post('/admin/product', 'store')->name('admin.product.store'); // Store a newly created resource in storage.
        Route::get('/admin/product/{product}/edit', 'edit')->name('admin.product.edit'); // Show the form for editing the specified resource.
        Route::put('/admin/product/{product}', 'update')->name('admin.product.update'); // Update the specified resource in storage.
        Route::delete('/admin/product/{product}/delete', 'destroy')->name('admin.product.delete'); // Remove the specified resource from storage.
    });

    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show')->withoutMiddleware(['auth', 'verified']); // Display the specified resource.

    Route::resource('order', OrderController::class);
    Route::post('/order/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

    Route::controller(CartController::class)->group(function () {
        Route::post('/cart', 'store')->name('cart.store');
        Route::get('/cart/{cart}', 'show')->name('cart.show');
        Route::put('/cart/{cart}', 'update')->name('cart.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
