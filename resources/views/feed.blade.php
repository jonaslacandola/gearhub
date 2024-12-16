<x-app-layout>
    <div class="relative grid grid-cols-[0.3fr_1fr] gap-8">
        <x-filter :categories="$categories" :filter="$filter" :minPrice="$minPrice" :maxPrice="$maxPrice" />
        <div class="flex flex-col gap-8">
            <div>
                <div class="aspect-[16/6] overflow-hidden rounded-2xl">
                    <div class="w-full h-full grid grid-cols-2 bg-gradient-to-r from-yellow-500 to-amber-500">
                        <div class="p-14">
                            <p class="text-3xl font-medium leading-relaxed mb-4">Upgrade Your Projects With Exclusive Hardware Deals</p>
                            <p class="text-lg leading-relaxed text-yellow-800">Quality Tools and Supplies at Unbeatable Prices!</p>
                        </div>
                        <div class="relative p-4">
                            <img src="{{ asset('images/model-2.png') }}" alt="" class="absolute top-2 right-10 w-[80%]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-4">
                @forelse ($products as $product) 
                    <x-product-card :product="$product"/>
                @empty
                    <p class="w-full text-center text-zinc-400 text-sm">Sorry, there are no offers available</p>
                @endforelse
            </div>
        </div>
    </div>

    <script type="module">
        import { animate, inView } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm";

        document.addEventListener('DOMContentLoaded', () => {
        // Find all sliders with the "swiper" class
        document.querySelectorAll('.swiper').forEach((swiper) => {
            inView(swiper, () => {
                animate(swiper, {
                    opacity: 1,
                }, {
                    delay: 0.5,
                });
                // Initialize Swiper for each slider
                new Swiper(swiper, {
                    loop: true, // Enable infinite looping
                    autoplay: {
                        delay: 6000, // Adjust delay for better readability
                        disableOnInteraction: false, // Continue autoplay even after interaction
                    },
                    slidesPerView: 1, // Show one slide at a time
                    spaceBetween: 10, // Add space between slides
                    centeredSlides: false,
                });
            })
        });
    });
    </script>
</x-app-layout>   