<div class="swiper relative flex flex-col h-auto w-[230px] rounded-xl shadow bg-background-light">
    <!-- Swiper container -->
    <div class="swiper-wrapper">
        @foreach(json_decode($product->images) as $imgURL)
            <!-- Each image must be inside a "swiper-slide" -->
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $imgURL) }}" alt="{{ $product->name }}" class="aspect-[3/2] object-cover">
            </div>
        @endforeach
    </div>
    <div class="w-full flex flex-col items-center gap-1 p-4">
        <h1 class="text-center text-lg font-semibold">{{ ucwords($product->name) }}</h1>
        <p class="text-center text-zinc-600 text-[12px] break-words line-clamp-2 w-[90%]">{{ $product->description }}</p>
        <p class="font-medium text-center">&#8369; {{ number_format($product->price, 2, '.', ',') }}</p>
    </div>
    <div>
        <form action="{{ route('cart.store', ['productId' => $product->id, 'quantity' => 1]) }}" method="post">
            @csrf
            <button type="submit" class="text-white text-sm text-center w-full bg-primary-orange p-4 active:bg-amber-700">
               {{ __('Add to cart') }}
            </button>
        </form>
    </div>
    <div class="absolute top-2 right-2 z-10">
        <button class="p-2 rounded-full bg-background-light active:bg-primary-orange">
            <i data-feather="heart" class="w-[16px] h-[16px] stroke-primary-orange"></i>
        </button>
    </div>
</div>
