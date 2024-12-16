@props(['product'])

<div class="min-w-[50%] px-8 py-6 overflow-hidden flex flex-col gap-2 border border-zinc-100 rounded-xl shadow">
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-semibold">{{ $product->name }}</h1>
        <form action="{{ route('cart.update', ['cart' => Auth::user()->cart->id, 'productId' => $product->id]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit">
                <i data-feather="x" class="w-4 h-4 stroke-current text-zinc-500"></i>
            </button>
        </form>
    </div>
    <div class="flex items-center gap-4">
        <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name . ' ' . $product->description }}" class="aspect-square object-cover rounded-md w-24 h-24">
        <div class="flex flex-col justify-center gap-2 w-3/4 line-clamp-2">
            <p class="text-sm text-zinc-600 line-clamp-2">{{ $product->description }}</p>
            <p class="self-start text-[12px] text-zinc-500 bg-zinc-200 rounded-md px-2 py-1">{{ $product->category->name }}</p>
            <div class="flex justify-between items-center">
                <p class="text-orange-500 font-medium">
                    &#8369; {{ number_format($product->price, 2, '.', ',') }} 
                </p>
                <livewire:quantity :quantity="$product->pivot->quantity" :product="$product->id" />
            </div>
        </div>
    </div>
</div>