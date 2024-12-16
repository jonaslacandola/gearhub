<x-app-layout>
    <div class="w-full h-full flex flex-col gap-4 rounded-xl px-8">
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-medium">Order History</h1>
            <p class="text-sm text-zinc-600">Here, you can view your recent orders, check their status, and access details like invoices or refund options.</p>
        </div>
        @forelse ($orders as $order)
            <div class="flex flex-col gap-4 py-4 border-b border-zinc-200">
                <div class="flex justify-between items-center gap-8 border-b-2 border-orange-500 pb-4">
                    <p class="text-sm text-zinc-600">#{{ strtoupper($order->id) }}</p>
                    <div class="flex items-center gap-4">
                        <p>{{ $order->created_at->format('M d, Y') }}</p>
                        <p class="font-medium {{ $order->status != 'refunded' ? 'text-orange-500' : 'text-zinc-400' }}">&#8369; {{ number_format($order->total / 100, 2, '.', ',') }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    @foreach ($order->products as $product)
                        <div class="grid grid-cols-[5rem_0.2fr_0.3fr_1fr_4rem_4rem] gap-8 items-center justify-between">
                            <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name . ' ' . $product->description }}" class="aspect-square object-cover rounded-md w-20 h-20">
                            <p class="font-semibold">{{ $product->name }}</p>
                            <p class="justify-self-center text-center text-[12px] text-zinc-500 bg-zinc-200 rounded-md px-2 py-1">{{ $product->category->name }}</p>
                            <p class="text-sm text-left text-zinc-600 line-clamp-2">{{ $product->description }}</p>
                            <p class="text-sm">Qty {{ $product->pivot->quantity }}</p>
                            <p class="text-sm">&#8369; {{ number_format($product->price, 2, '.', ',') }}</p>
                        </div>
                    @endforeach
                </div>
                <form action="{{ route('order.show', ['order' => $order->id]) }}" method="get" class="self-end flex items-center gap-4">
                    @if ($order->status == 'refunded')
                        <p class="text-sm px-4 py-3 rounded-md bg-zinc-200 text-zinc-600">
                            {{ ucwords($order->status) }}
                        </p>
                    @else
                        <p class="text-sm px-4 py-3 rounded-md border-2 border-orange-500 text-orange-500">
                            {{ ucwords($order->payment_status) }}/{{ ucwords($order->status) }}
                        </p>
                    @endif  
                    <x-primary-button class="text-sm">
                        {{ __('View Order') }}
                    </x-primary-button>
                </form>
            </div>
        @empty

        @endforelse
    </div>
</x-app-layout>