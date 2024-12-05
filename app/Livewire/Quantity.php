<?php

namespace App\Livewire;

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Quantity extends Component
{   
    public $quantity = 0, $product;

    public function mount($quantity, $product)
    {
        $this->quantity = $quantity;
        $this->product = $product;
    }

    public function increment() {
        $cart = new CartController();
    
        $this->quantity += 1;
        
        $cart->updateQuantityPivot($this->quantity, $this->product);
    }

    public function decrement() {
        $cart = new CartController();
    
        $this->quantity -= 1;
        
        $cart->updateQuantityPivot($this->quantity, $this->product);
    }

    public function render()
    {
        return view('livewire.quantity');
    }
}
