@extends('product.layout')

@section('content')
    <nav class="py-4 px-8 flex justify-between">
        <h1 class="flex gap-2 items-center text-xl font-semibold">
            <i data-feather="copy"></i>
            <span>Product</span>
        </h1>

        <ul class="flex items-center gap-4">
            <li>
                <form action="" class="flex">
                    <input type="search" name="" id="" placeholder="Search product">
                    <button type="submit" class="px-4 py-2 bg-zinc-600 text-white rounded-sm">Search</button>
                </form>
            </li>
            <li>
                <a href="{{route('product.create')}}" class="px-5 py-3 outline outline-1 outline-zinc-600 rounded-sm">Create Product</a>
            </li>
        </ul>
    </nav>
@endsection