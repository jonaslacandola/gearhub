<div class="swiper relative flex flex-col gap-2 h-auto w-[260px] rounded-2xl">
    <!-- Swiper container -->
    <div class="swiper-wrapper">
        @foreach(json_decode($product->images) as $imgURL)
            <!-- Each image must be inside a "swiper-slide" -->
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $imgURL) }}" alt="{{ $product->name }}" class="aspect-square object-cover rounded-2xl">
            </div>
        @endforeach
    </div>
    <div class="flex flex-col gap-2 py-2">
        <div class="flex items-center gap-2">
            <h1 class="text-xl font-semibold">{{ $product->name }}</h1>
            <a href="{{route('product.show', $product->id)}}" class="p-2 rounded-full hover:bg-purple-100">
                <i data-feather="arrow-up-right" class="stroke-purple-600 w-[18px] h-[18px]"></i>
            </a>
        </div>
        <p class="text-slate-700 break-words line-clamp-2">{{ $product->description }}</p>
        <p class="font-semibold text-purple-600">PHP {{ $product->price }}</p>
    </div>
</div>
