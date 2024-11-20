<x-app-layout>
    <div class="h-full w-3/4 mx-auto flex gap-8">
        <div class="w-1/2 rounded-md flex overflow-hidden">
            @foreach (json_decode($product->images) as $imgURL)
            <img src="{{ asset('storage/' . $imgURL) }}" alt="" class="aspect-[12/6] object-cover">
            @endforeach
        </div>
        <h1>{{$product->name}}</h1>
    </div>
</x-app-layout>