<div class="swiper relative flex flex-col h-auto w-[230px] rounded-xl shadow bg-zinc-50 opacity-0">
    <!-- Swiper container -->
    <div class="swiper-wrapper">
        @foreach(json_decode($product->images) as $imgURL)
            <!-- Each image must be inside a "swiper-slide" -->
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $imgURL) }}" alt="{{ $product->name }}" class="aspect-[3/2] object-cover">
            </div>
        @endforeach
    </div>
    <div class="w-full h-full grid grid-rows-[2rem_1fr_2rem_2rem] gap-1 p-4">
        <h1 class="text-lg font-semibold">{{ ucwords($product->name) }}</h1>
        <p class="text-zinc-600 text-[12px] break-words w-[90%] line-clamp-2 text-">{{ $product->description }}</p>
        <p class="font-medium text-lg">&#8369; {{ number_format($product->price, 2, '.', ',') }}</p>
        <p class="text-center justify-self-start self-center text-[12px] text-zinc-500 bg-zinc-200 rounded-md px-2 py-1">{{ $product->category->name }}</p>
    </div>
    <div>
        <form action="{{ route('cart.store', ['productId' => $product->id, 'quantity' => 1]) }}" method="post">
            @csrf
            <button type="submit" class="text-white text-sm text-center w-full bg-gradient-to-r from-orange-500 to-orange-600 p-4 active:from-orange-600 active:to-orange-700">
               {{ __('Add to cart') }}
            </button>
        </form>
    </div>
    <div class="absolute top-2 right-2 z-10">
        <button class="p-2 rounded-full">
            <i data-feather="heart" class="w-[18px] h-[18px] stroke-orange-500"></i>
        </button>
    </div>
</div>
