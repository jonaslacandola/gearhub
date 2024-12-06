<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderSummary extends Component
{   public $summary = [], $count = 0, $subTotal = 0;
    
    public function mount() {
        $this->initiateSummary();
    }
    
    public function render()
    {
        return view('livewire.order-summary');
    }
    
    #[On('quantity-updated')]
    public function initiateSummary() {
        $products = Auth::user()->cart->products;
        
        $this->summary = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'totalPrice' => $product->price * $product->pivot->quantity,
            ];
        });
        $this->subTotal = array_reduce($products->toArray(), function ($ctr, $itm) {
            return $ctr += $itm['price'] * $itm['pivot']['quantity'];
        }, 0);
        $this->count = count($products);
    }
}
