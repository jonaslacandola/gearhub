<?php

namespace App\Livewire;

use App\Models\Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProductCard extends Component 
{   public $product, $quantity = 1;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render() 
    {
        return view('livewire.product-card');
    }

    public function open()
    {
        return $this->redirect(route('product.show', $this->product->id));
    }

    public function store()
    {      
        try {

            $cart = Auth::user()->cart;
            
            if (!$cart) {
                $cart = Cart::create([
                    "userId" => Auth::id()
                ]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect(route('login'));
        }

        $product = $cart->products()->where('productId', $this->product->id)->first();

        Log::info($product);

        if ($product) {
            $cart->products()->updateExistingPivot($this->product->id, ['quantity' => $product->pivot->quantity + $this->quantity]);
        } else {
            $cart->products()->attach($this->product->id, ['quantity' => $this->quantity]);
        }

        $this->dispatch('cart/updated');
    }
    
}

?>