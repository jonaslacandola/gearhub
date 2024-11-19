<div class="flex flex-col h-auto w-[260px] rounded-sm my-8">
    <div class="relative h-full w-full flex overflow-hidden">
        @foreach(json_decode($product->images) as $imgURL)
            <img src="{{asset('storage/' . $imgURL)}}" alt="{{$product->name}}" class="aspect-square object-cover rounded-md">
        @endforeach
    </div>
    <div class="flex flex-col bg-white py-4">
        <h1 class="text-lg font-semibold">{{$product->name}}</h1>
        <p class="text-zinc-600 break-words line-clamp-2">{{$product->description}}</p>
        <div class="flex justify-between items-center">
            <p class="font-semibold">Price</p>
            <p class="font-semibold text-lg text-purple-600">PHP {{$product->price}}</p>
        </div>
    </div>
    <!-- <a href="{{route('product.show', $product->id)}}" class="absolute stroke stroke-purple-600 top-0 right-0 rounded-full p-2">
        <i data-feather="info" class="w-5 h-5"></i>
    </a> -->
</div>  