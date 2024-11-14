<div class="flex flex-col h-[460px] w-[300px] outline outline-1 outline-zinc-800 rounded-sm my-8">
    <div class="w-full flex overflow-hidden">
        @foreach(json_decode($product->images) as $imgURL)
            <img src="{{asset('storage/' . $imgURL)}}" alt="{{$product->name}}" class="aspect-square object-cover">
        @endforeach
    </div>
    <div class="p-2 flex flex-col gap-2">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold">{{$product->name}}</h1>
            <p class="font-medium">${{$product->price}}</p>
        </div>
        <p>{{$product->description}}</p>
    </div>
</div>  