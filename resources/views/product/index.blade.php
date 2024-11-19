@extends('product.layout')

@section('content')
    <nav class="py-4 px-8 flex justify-between border-b border-zinc-200">
        <h1 class="flex gap-2 items-center text-xl font-semibold">
            <i data-feather="copy"></i>
            <span>Product</span>
        </h1>

        <ul class="flex items-center gap-4">
            <li>
                <form action="" class="flex">
                    <input type="search" name="" id="" placeholder="Search product">
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-sm">Search</button>
                </form>
            </li>
            <li>
                <a href="{{route('product.create')}}" class="px-5 py-3 outline outline-1 outline-purple-600 text-purple-600 rounded-sm">Create Product</a>
            </li>
        </ul>
    </nav>

    <section class="w-3/4 mx-auto flex flex-wrap gap-8 ">
        @forelse ($products as $product) 
            <x-product-card :product="$product"/>
        @empty
            <p class="text-center text-xl m-8 text-zinc-400">There are no products available</p>
        @endforelse
    </section>
@endsection