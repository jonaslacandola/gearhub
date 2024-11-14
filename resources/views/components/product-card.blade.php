<div class="flex flex-col h-auto w-[300px] rounded-sm my-8">
    <div class="relative slide w-full flex overflow-hidden">
        @foreach(json_decode($product->images) as $imgURL)
            <img src="{{asset('storage/' . $imgURL)}}" alt="{{$product->name}}" class="aspect-square object-cover rounded-sm">
        @endforeach
    </div>
    <div class="flex flex-col bg-white py-4">
        <h1 class="text-lg font-semibold">{{$product->name}}</h1>
        <p class="text-zinc-600">{{$product->description}}</p>
        <div class="flex justify-between items-center">
            <p class="font-semibold">PHP {{$product->price}}</p>
            <div class="flex">
                <button class="hover:bg-zinc-200 rounded-full p-2">
                    <i data-feather="trash" class="w-5 h-5"></i>
                </button>
                <a href="{{route('product.show', $product->id)}}" class="hover:bg-zinc-200 rounded-full p-2">
                    <i data-feather="info" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </div>
</div>  