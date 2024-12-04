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
                            <div class="flex justify-between items-center">
                                <p class="text-primary-orange font-medium">
                                    ${{ $product->price }} 
                                </p>
                                <form class="flex items-center gap-4">
                                    <button class="rounded bg-zinc-200 p-1 active:bg-zinc-300">
                                        <i data-feather="minus" class="stroke-zinc-500 w-[16px] h-[16px]"></i>
                                    </button>
                                    <span class="text-sm">{{ $product->pivot->quantity }}</span>
                                    <button class="rounded bg-zinc-200 p-1 active:bg-zinc-300">
                                        <i data-feather="plus" class="stroke-zinc-500 w-[16px] h-[16px]"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            @empty 
                <p class="w-full text-center text-accent-gray text-lg">No items in cart? Start shopping now! 😃</p>
            @endforelse
        </div>
        @endisset
        <div class="w-full flex justify-end">
            <x-primary-button>
                {{ __('Check Out') }}
            </x-primary-button>
        </div>
    </div>
</x-app-layout>