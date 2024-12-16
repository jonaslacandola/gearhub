<x-app-layout>
    <div class="flex flex-col gap-8">
        @isset($products)
            @if (count($products))
                <div class="relative grid grid-cols-[1fr_0.6fr] gap-8">
                    <div class="w-full flex flex-col gap-4">
                        @foreach ($products as $product)
                            <x-cart-card :product="$product" />
                        @endforeach
                    </div>
                    <livewire:order-summary />
                </div>
            @else 
                <form action="{{ route('feed') }}" method="get" class="flex flex-col justify-center items-center gap-4">
                    <p class="text-zinc-400 text-sm">Your shopping cart is empty</p>
                    <x-primary-button class="text-sm">
                        {{ __('Go Shopping Now!') }}
                    </x-primary-button>
                </form>
            @endif
        @endisset
    </div>
</x-app-layout>