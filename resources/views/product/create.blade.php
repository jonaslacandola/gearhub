<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating a new product') }}
        </h2>
    </x-slot>

    <section class="h-full w-full">
        @if (session('error'))
        <p class="p-2 bg-red-500 text-red-50 text-center">{{session('error')}}</p>
        @endif

        <div class="w-3/4 grid grid-cols-2 items-center gap-10 mt-8 p-2 mx-auto">
            <div class="swiper relative h-full w-full flex items-center justify-center bg-gray-100 rounded-md" id="preview-container">
                <div class="swiper-wrapper h-full w-full flex items-center justify-center">
                    <p id="preview" class="text-4xl text-gray-200">Preview</p>
                </div>

                <div class="absolute p-2 w-full h-full flex items-center justify-between z-10">
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
                <input type="file" name="images[]" id="images" onchange="handleFileUpload(event)" multiple>
                <label for="description">Description</label>
                <div class="flex flex-col bg-zinc-100 rounded-md outline-2 outline-purple-600 focus-within:outline">
                    <textarea name="description" id="description" placeholder="Description..." class="h-36 resize-none outline-none focus"></textarea>
                    <button type="submit" class="self-end px-6 py-4 bg-purple-600 text-white rounded-md m-2">Create</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        let swiperInstance; // Store Swiper instance for reuse

        function handleFileUpload(event) {
            const swiper = document.querySelector('.swiper');
            const swiperWrapper = document.querySelector('.swiper-wrapper');
            const files = Array.from(event.target.files);

            if (!files.length) return;

            // Remove existing slides and preview text
            swiperWrapper.innerHTML = '';

            // Add new slides
            files.forEach((file) => {
                const fileReader = new FileReader();

                fileReader.readAsDataURL(file);

                fileReader.onload = (img) => {
                    const imgEl = document.createElement('img');
                    imgEl.src = img.target.result;
                    imgEl.classList.add('aspect-[1/1]', 'object-cover');

                    const swiperSlide = document.createElement('div');
                    swiperSlide.classList.add('swiper-slide');
                    swiperSlide.appendChild(imgEl);

                    swiperWrapper.appendChild(swiperSlide);
                };
            });

            // Reinitialize Swiper after slides are added
            setTimeout(() => {
                if (swiperInstance) swiperInstance.destroy(); // Destroy previous instance

                swiperInstance = new Swiper(swiper, {
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: true,
                    },
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '#btn-right',
                        prevEl: '#btn-left',
                    },
                });
            }, 100);
        }
    </script>
</x-app-layout>