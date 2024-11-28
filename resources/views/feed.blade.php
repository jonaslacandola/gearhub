<x-app-layout>
    <div class="flex flex-wrap gap-4">
        @forelse ($products as $product) 
            <x-product-card :product="$product"/>
        @empty
            <p class="w-full text-center text-accent-gray text-lg">There are no products available 🥲</p>
        @endforelse
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
                centeredSlides: false,
            });
        });
    });
    </script>
</x-app-layout>   