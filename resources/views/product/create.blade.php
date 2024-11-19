@extends('product.layout')

@section('content')
    <section class="h-full w-full ">
        @if (session('error'))
        <p class="p-2 bg-red-500 text-red-50 text-center">{{session('error')}}</p>
        @endif

        <a href="{{route('product.index')}}" class="p-4 font-semibold flex items-center gap-2">
            <i data-feather="corner-up-left"></i>
            <span>Home</span>
        </a>

        <div class="w-3/4 grid grid-cols-2 items-center gap-10 p-2 mx-auto">
            <div class="relative h-full flex items-center justify-center w-full bg-zinc-300 rounded-sm" id="preview-container">
                <p class="text-4xl text-zinc-400">Preview</p>
                <div class="absolute p-2 w-full h-full flex items-center justify-between">
                    <button id="btn-left">
                        <i data-feather="chevron-left"></i>
                    </button>
                    <button id="btn-right">
                        <i data-feather="chevron-right"></i>
                    </button>
                </div>
            </div>
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="w-[80%] flex flex-col gap-4">
                @csrf
                <label for="name">Product</label>
                <input type="text" name="name" id="name" placeholder="Product">
                <label for="Price">Price</label>
                <input type="number" name="price" id="price" placeholder="Price">
                <label for="images">Images</label>
                <input type="file" name="images[]" id="images" multiple>
                <label for="description">Description</label>
                <div class="flex flex-col gap-2 bg-zinc-200 rounded-sm outline-1 outline-offset-1 outline-zinc-600 focus-within:outline">
                    <textarea name="description" id="description" placeholder="Description..." class="h-36 resize-none outline-none"></textarea>
                    <button type="submit" class="self-end px-6 py-4 bg-purple-600 text-white rounded-sm m-2">Create</button>
                </div>
            </form>
        </div>
    </section>
@endsection