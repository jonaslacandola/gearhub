<x-app-layout>
    <div class="flex flex-col gap-8">
        <h1 class="text-2xl font-semibold">
            <span>My Cart</span>
            <span class="text-primary-orange">({{ count($products) }})</span>
        </h1>
        @isset($products)
        <div class="flex flex-col gap-4">
            @forelse($products as $product) 
                <div class="p-4 overflow-hidden flex flex-col gap-2 rounded-xl shadow">
                    <h1 class="text-lg font-semibold">{{ $product->name }}</h1>
                    <div class="flex gap-4">
                        <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name . ' ' . $product->description }}" class="aspect-square object-cover rounded-md w-24 h-24">
                        <div class="flex flex-col gap-2 w-3/4 line-clamp-2">
                            <p class="text-sm text-zinc-600 line-clamp-3">{{ $product->description }}</p>
                            <div class="flex justify-between items-center">
                                <p class="text-primary-orange font-medium">
                                    ${{ $product->price }} 
                                </p>
                                <livewire:quantity :quantity="$product->pivot->quantity" :product="$product->id" />
                            </div>
                        </div>
                    </div>
                </div>
            @empty 
                <form action="{{ route('feed') }}" method="get" class="flex justify-center items-center gap-2">
                    <p class="text-zinc-400 text-sm">Your shopping cart is empty</p>
                    <x-primary-button class="text-sm">
                        {{ __('Go Shopping Now!') }}
                    </x-primary-button>
                </form>
            @endforelse
        </div>
        @endisset
        <form method="post" action="{{ route('checkout') }}" class="w-full flex justify-end">
            @csrf
            <x-primary-button class="text-sm">
                {{ __('Check Out') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>