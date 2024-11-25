<x-app-layout>
    @if (count($products))
        <div class="flex flex-row">
            @foreach ($products as $product) 
                <x-product-card :product="$product"/>
            @endforeach
        </div>
    @endif

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