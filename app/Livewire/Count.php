<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Count extends Component
{   public $count = 0;

    public function mount()
    {
        $this->count();
    }

    public function render()
    {
        return view('livewire.count');
    }

    #[On('cart/updated')]
    public function count()
    {
        $this->count = Auth::user()->cart->products()->count();
    }
}
