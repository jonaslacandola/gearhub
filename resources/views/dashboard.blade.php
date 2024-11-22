<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-cols items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <ul class="flex items-center gap-4">
                <li>
                    <form action="{{ route('dashboard') }}" method="get" class="flex">
                        <input type="search" name="search" id="search" placeholder="Search product" class="rounded-s-md">
                        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-r-md">Search</button>
                    </form>
                </li>
                <li>
                    <a href="{{route('product.create')}}" class="px-5 py-3 outline outline-1 text-sm outline-purple-600 text-purple-600 rounded-md">Create Product</a>
                </li>
            </ul>
        </div>
    </x-slot>

    @if (session('success'))
    <p class="py-2 px-10 bg-green-500 text-lime-50 font-medium">
        {{session('success')}}
    </p>
    @endif

    <div class="w-full my-10">
        @if (count($products))
            <div class="w-3/4 mx-auto grid grid-cols-5 gap-8">
                @foreach ($products as $product) 
                    <x-product-card :product="$product"/>
                @endforeach
            </div>
        @else 
            <p class="w-full text-center text-xl m-8 text-gray-300">There are no products available</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        // Find all sliders with the "swiper" class
        document.querySelectorAll('.swiper').forEach((swiper) => {
            // Initialize Swiper for each slider
            new Swiper(swiper, {
                loop: true, // Enable infinite looping
                autoplay: {
                    delay: 3000, // Adjust delay for better readability
                    disableOnInteraction: false, // Continue autoplay even after interaction
                },
                slidesPerView: 1, // Show one slide at a time
                spaceBetween: 10, // Add space between slides
            });
        });
    });
    </script>
</x-app-layout>
