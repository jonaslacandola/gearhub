<div class="sticky w-[80%] top-40 max-h-[346px] flex flex-col p-6 gap-4 rounded-xl shadow">
    <h1 class="text-lg">Order Summary</h1>
    <div class="w-full h-full flex flex-col gap-2 overflow-y-scroll">
        @foreach ($summary as $item) 
            <div class="grid grid-cols-[1fr_0.4fr] items-center">
                <p class="text-sm">
                    <span>{{ $item['name'] }}</span>
                    &times; 
                    <span>{{ $item['quantity'] }}</span>
                </p>
                <p class="text-sm text-left">&#8369; {{ number_format($item['totalPrice'], 2, '.', ',') }}</p>
                <p class="text-sm text-left text-zinc-600">&#8369; {{ number_format($item['price'], 2, '.', ',') }}</p>
            </div>
        @endforeach
    </div>
    <form method="post" action="{{ route('checkout') }}" class="w-full h-1/2 flex flex-col gap-4 justify-end items-end">
        @csrf
        <div class="w-full flex items-center justify-between">
            <p class="text-sm text-zinc-600">Subtotal</p>
            <p class="text-sm font-medium text-primary-orange">&#8369; {{ number_format($subTotal, 2, '.', ',') }}</p>
        </div>
        <x-primary-button class="text-sm">
            {{ __('Check Out ') }} ({{ $count }}) 
        </x-primary-button>
    </form>
</div>