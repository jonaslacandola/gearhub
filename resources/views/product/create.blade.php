<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating a new product') }}
        </h2>
    </x-slot>

    <section class="h-full w-full">
        <div class="w-full grid grid-cols-2 items-center gap-20 p-2 mx-auto">
            <div class="swiper relative w-full h-full max-h-[400px] flex bg-zinc-200 rounded-md overflow-hidden">
                <div class="swiper-wrapper flex items-center">
                    <p id="preview-placeholder" class="w-full font-light text-4xl text-center text-zinc-300">Preview</p>
                </div>

                <div class="absolute p-2 w-full h-full flex items-center justify-between z-10">
                    <button id="btn-prev" class="bg-orange-500 rounded-full p-2 active:bg-amber-700">
                        <i data-feather="chevron-left" class="w-[18px] h-[18px] stroke-white"></i> 
                    </button>
                    <button id="btn-next" class="bg-orange-500 rounded-full p-2 active:bg-amber-700">
                        <i data-feather="chevron-right" class="w-[18px] h-[18px] stroke-white"></i>
                    </button>
                </div>
            </div>

            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="w-full flex flex-col gap-2">
                @csrf
                <x-input-label for="name" class="mb-0">Product</x-input-label>
                <x-text-input type="text" name="name" id="name" placeholder="Product" />

                <x-input-label for="Price" class="mb-0 mt-2">Price</x-input-label>
                <x-text-input type="number" name="price" id="price" placeholder="Price" />

                <x-input-label for="category" class="mb-0 mt-2">Category</x-input-label>
                <select name="category" id="category" class="text-sm py-2 px-3 bg-transparent rounded-lg border border-accent-gray outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    <option value="" disabled hidden selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>

                <x-input-label for="images" class="mb-0 mt-2">Images</x-input-label>
                <input type="file" name="images[]" id="images" onchange="handleFileUpload(event)" class="text-sm py-2 px-3 rounded-lg border border-accent-gray outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2" multiple>

                <x-input-label for="description" class="mb-0 mt-2">Description</x-input-label>
                <div class="flex flex-col py-2 px-3 rounded-lg border border-accent-gray focus-within:ring-2 focus-within:ring-orange-500 focus-within:ring-offset-2">
                    <textarea name="description" id="description" placeholder="Description" class="h-36 text-sm resize-none outline-none focus bg-transparent placeholder:text-accent-gray placeholder:text-sm"></textarea>
                    <x-primary-button class="self-end text-sm">{{ __('Create') }}</x-primary-button>
                </div>
            </form>
        </div>
    </section>

    <script>
        let swiperInstance; // Store Swiper instance for reuse
        
         window.handleFileUpload = function (event) {
            const swiper = document.querySelector('.swiper')
            const swiperWrapper = document.querySelector('.swiper-wrapper')
            const files = Array.from(event.target.files);

            if (!files.length) return;

            // Reset the slider
            swiperWrapper.innerHTML = '';

            // Add new slides
            files.forEach((file) => {
                const fileReader = new FileReader();

                fileReader.readAsDataURL(file);

                fileReader.onload = (img) => {
                    const imgElement = document.createElement('img');
                    imgElement.src = img.target.result;
                    imgElement.classList.add('aspect-[1/1]', 'object-cover', 'object-center');

                    const swiperSlide = document.createElement('div');
                    swiperSlide.classList.add('swiper-slide');
                    swiperSlide.appendChild(imgElement);

                    swiperWrapper.appendChild(swiperSlide);
                };
            });

            setTimeout(() => {
                if (swiperInstance) swiperInstance.destroy(); // Destroy previous instance

                swiperInstance = new Swiper(swiper, {
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: true,
                    },
                    slidesPerView: 1,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '#btn-next',
                        prevEl: '#btn-prev',
                    },
                });
            }, 100);
        }
    </script>
</x-app-layout>