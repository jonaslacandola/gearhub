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
        
        $cart->updateQuantity($this->quantity, $this->product);

        $this->dispatch('quantity/changed');
    }

    public function decrement() {
        if ($this->quantity == 1) {
            return;
        }

        $cart = new CartController();
        $this->quantity -= 1;
        $cart->updateQuantity($this->quantity, $this->product);

        $this->dispatch('quantity/changed');
    }

    public function render()
    {
        return view('livewire.quantity');
    }
}
