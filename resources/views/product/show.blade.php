<x-app-layout>
    <div class="h-full grid grid-cols-[0.6fr_1fr] items-center gap-8">
        <div class="rounded-xl h-[340px] flex overflow-hidden">
            @foreach (json_decode($product->images) as $imgURL)
            <img src="{{ asset('storage/' . $imgURL) }}" alt="" class="aspect-[16/4] object-cover">
            @endforeach
        </div>
        <div class="flex flex-col gap-4">
            <h1 class="font-semibold text-4xl">{{ $product->name }}</h1>
            <p class="font-light text-sm w-3/4">{{ $product->description }}</p>
            <p>{{ $product->category->name }}</p>
            <p class="text-2xl text-orange-500 font-medium">&#8369; {{ number_format($product->price, 2, '.', ',') }}</p>
        </div>
    </div>
</x-app-layout>