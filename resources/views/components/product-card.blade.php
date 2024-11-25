<div class="swiper relative flex flex-col h-auto w-[230px] rounded-xl shadow">
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
        <h1 class="text-lg text-center font-semibold">{{ $product->name }}</h1>
        <p class="text-center text-zinc-600 text-sm break-words line-clamp-2">{{ $product->description }}</p>
        <p class="font-semibold text-center">$ {{ $product->price }}</p>
    </div>
    <div>
        <form action="">
            <button type="submit" class="text-white text-sm text-center w-full bg-primary-orange p-4">
               {{ __('Add to cart') }}
            </button>
        </form>
    </div>
</div>
