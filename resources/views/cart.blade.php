<x-app-layout>
    <div class="flex flex-col gap-8">
        <h1 class="text-2xl font-semibold">My Cart</h1>
        @isset($products)
        <div class="flex flex-col gap-4">
            @forelse($products as $product) 
            <div class="p-4 overflow-hidden flex flex-col gap-2 rounded-xl shadow">
                <h1 class="text-lg font-semibold">{{ $product->name }}</h1>
                <div class="flex gap-4">
                    <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name . ' ' . $product->description }}" class="aspect-square object-cover rounded-md w-24 h-24">
                    <div class="flex flex-col gap-2 w-3/4 line-clamp-2">
                        <p class="text-sm text-zinc-600">{{ $product->description }}</p>
                        <p class="font-medium">
                            <span class="text-primary-orange">
                                ${{ $product->price }} 
                            </span>
                            <span>
                                x 
                            </span>
                            <span>
                                {{ $product->pivot->quantity }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            @empty 
            
            @endforelse
        </div>
        @endisset
        <div class="w-full flex justify-end">
            <x-primary-button>
                {{ __('Checkout') }}
            </x-primary-button>
        </div>
    </div>
</x-app-layout>