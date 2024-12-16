<x-app-layout>
    <div class="flex flex-col gap-4 rounded-xl px-8">
        <div class="flex justify-between items-center gap-4">
            <h1 class="text-2xl font-medium">Order Details</h1>
            <a href="{{ route('order.index') }}">
                <i data-feather="x" class="w-[18px] h-[18px]"></i>
            </a>
        </div>
        <div class="flex justify-between items-center pb-4">
            <p class="text-sm text-zinc-600">#{{ $order->id }}</p>
            @if ($order->status == 'refunded')
                <p class="text-sm px-4 py-3 rounded-md bg-zinc-200 text-zinc-600">
                    {{ ucwords($order->status) }}
                </p>
            @else
                <p class="text-sm px-4 py-3 rounded-md border-2 border-orange-500 text-orange-500">
                    {{ ucwords($order->status) }}
                </p>
            @endif  
        </div>
        <div class="flex flex-col gap-4 pb-4">
            @foreach ($order->products as $product)
                <div class="grid grid-cols-[5rem_0.2fr_0.3fr_1fr_4rem_4rem] gap-8 items-center justify-between pb-4 border-b border-zinc-200">
                    <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name . ' ' . $product->description }}" class="aspect-square object-cover rounded-md w-20 h-20">
                    <p class="font-semibold">{{ $product->name }}</p>
                    <p class="justify-self-center text-center text-[12px] text-zinc-500 bg-zinc-200 rounded-md px-2 py-1">{{ $product->category->name }}</p>
                    <p class="text-sm text-left text-zinc-600 line-clamp-2">{{ $product->description }}</p>
                    <p class="text-sm">Qty {{ $product->pivot->quantity }}</p>
                    <p class="text-sm">&#8369; {{ number_format($product->price, 2, '.', ',') }}</p>
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-2 gap-4 p-8 shadow-md border border-zinc-200 rounded-lg">
            <div class="text-sm flex flex-col gap-2 grid-rows-2">
                <p class="text-lg">Customer Details</p>
                <p class="text-sm">{{$order->name}}</p>
                <p class="text-sm">{{$order->email}}</p>
                <p class="text-sm w-1/2">{{$order->address}}, {{$order->country}}</p>
            </div>
            <div class="text-sm flex flex-col gap-2 border-zinc-200">
                <p class="text-lg">Total Summary</p>
                @if ($order->status == 'refunded')
                    <div class="grid grid-cols-[1fr_6rem] items-center">
                        <p class="text-sm">Refunded On</p>
                        <p class="text-sm">{{ date('M d, Y', strtotime($order->refund_completed_at)) }}</p>
                    </div>
                @endif
                <div class="grid grid-cols-[1fr_6rem] items-center">
                    <p class="text-sm">Payment</p>
                    <p class="text-sm">{{ ucwords($order->payment_method) }}</p>
                </div>
                <div class="grid grid-cols-[1fr_6rem] items-center">
                    <p class="text-sm">Subtotal</p>
                    <p class="text-left text-sm">&#8369; {{ number_format($order->total / 100 - 58, 2, '.', ',') }}</p>
                </div>
                <div class="grid grid-cols-[1fr_6rem] items-center">
                    <p class="text-sm">Shipping Fee</p>
                    <p class="text-sm">&#8369; {{ number_format(58, 2, '.', ',') }}</p>
                </div>
                <div class="grid grid-cols-[1fr_6rem] items-center">
                    <p class="text-lg">Total</p>
                    <p class="text-lg">&#8369; {{ number_format($order->total / 100, 2, '.', ',') }}</p>
                </div>
            </div>
            <div class="grid-cols-2 flex items-center justify-start gap-2">
                <form action="">
                    <x-primary-button>
                        {{ __('View Invoice') }}
                    </x-primary-button>
                </form>
                @if ($order->status != 'refunded')
                    <form action="{{ route('order.cancel', ['order' => $order->id]) }}" method="post">
                        @csrf
                        <x-secondary-button type="submit">
                            {{ __('Refund') }}
                        </x-primary-button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>