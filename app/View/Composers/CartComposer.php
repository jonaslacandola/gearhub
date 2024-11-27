<?php
namespace App\View\Composers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartComposer 
{

    public function compose(View $view) 
    {
        $itemsInCart = 0;

        if (Auth::check()) {
            $cart = Auth::user()->cart;

            if (!$cart) {
                $cart = Cart::create([
                    "userId" => Auth::id()
                ]);
            }

            $products = $cart->products;
            $itemsInCart = count($products);
        }


        $view->with('itemsInCart', $itemsInCart);
    }
}
?>