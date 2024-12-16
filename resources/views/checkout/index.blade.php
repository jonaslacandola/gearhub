<x-app-layout>
    <div class="w-full grid grid-cols-2 gap-8">
        <div class="h-full shadow rounded-xl p-8">
            <p class="mb-4">Order Summary</p>
            <div class="flex flex-col gap-2 overflow-y-scroll">
                @foreach ($summary as $product) 
                <div class="grid grid-cols-[1fr_0.5fr_0.3fr] items-center">
                    <div>
                        <p class="text-sm">{{ $product['name'] }}</p>
                        <p class="text-sm text-zinc-600">{{ $product['category'] }}</p>
                    </div>
                    <p class="text-sm">&#8369; {{ number_format($product['price'], 2, '.', ',') }} &Cross; {{ $product['quantity'] }}</p>
                    <p class="text-sm text-orange-500">&#8369; {{ number_format($product['totalPrice'], 2, '.', ',') }} </p>
                </div>
                @endforeach 
            </div>
        </div>
        <div class="h-full shadow rounded-xl p-8">
            <form action="{{ route('checkout.store') }}" method="post" class="h-full flex flex-col gap-4 w-full">
                @csrf
                <p>Select Payment Method</p>
                <div class="flex-grow flex flex-col gap-4">
                    <input type="radio" name="payment_method" id="card" value="card" class="hidden peer" required>
                    <label for="card" class="flex flex-col gap-4 p-4 border-2 border-zinc-300 rounded-md cursor-pointer peer-checked:border-orange-500">
                        <div class="flex gap-2 items-center">
                            <i data-feather="credit-card" class="w-[20px] h-[20px]"></i>
                            <p class="text-sm">Credit/Debit Card</p>
                        </div>
                    </label>
                </div>
                <p class="mt-8">Total Summary</p>
                <div class="flex justify-between items-center">
                    <p class="text-sm text-zinc-600">Subtotal ({{ $count }} items)</p>
                    <p class="text-sm">&#8369; {{ number_format($subTotal, 2, '.', ',') }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-sm text-zinc-600">Shipping Fee</p>
                    <p class="text-sm">&#8369; {{ number_format(58, 2, '.', ',') }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <p>Total</p>
                    <p class="text-orange-500">&#8369; {{ number_format($subTotal + 58, 2, '.', ',') }}</p>
                </div>
                <x-primary-button type="submit">Place Order</x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>