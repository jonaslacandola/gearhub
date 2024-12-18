<section class="h-full w-full">
    <div class="w-full gap-20 p-2 mx-auto">
        <form id="create-form" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="initial-form" class="flex flex-col gap-2">
                <x-input-label for="name">Product</x-input-label>
                <x-text-input type="text" name="name" id="name" placeholder="Product" />
                
                <x-input-label for="price" class="mt-2">Price</x-input-label>
                <x-text-input type="number" name="price" id="price" placeholder="Price" />

                <x-input-label for="stock" class="mt-2">Stock</x-input-label>
                <x-text-input type="number" name="stock" id="stock" placeholder="Stock" />
                
                <x-input-label for="category" class="mt-2">Category</x-input-label>
                <select name="category" id="category" class="text-sm py-2 px-3 bg-transparent rounded-lg border border-accent-gray outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                <option value="" disabled hidden selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
                </select>
                
                <x-input-label for="description" class="mt-2">Description</x-input-label>
                <div class="flex flex-col py-2 px-3 rounded-lg border border-accent-gray focus-within:ring-2 focus-within:ring-orange-500 focus-within:ring-offset-2">
                    <textarea name="description" id="description" placeholder="Description" class="h-36 text-sm resize-none outline-none focus bg-transparent placeholder:text-accent-gray placeholder:text-sm"></textarea>
                    <x-primary-button id="add-image-btn" class="self-end text-sm">{{ __('Add Image') }}</x-primary-button>
                </div>
            </div>

            <div id="add-image" class="hidden opacity-0 flex-col gap-2">
                <x-input-label for="images" class="mt-2">Images</x-input-label>
                <input type="file" name="images[]" id="images" onchange="handleFileUpload(event)" class="text-sm py-2 px-3 rounded-lg border border-accent-gray outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2" multiple>
                
                <div class="swiper relative w-full h-80 flex bg-zinc-200 rounded-md overflow-hidden">
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
                <div class="flex items-center justify-end gap-2">
                    <x-secondary-button id="back-btn" class="text-sm">{{ __('Back') }}</x-secondary-button>
                    <x-primary-button type="submit" class="text-sm">{{ __('Add Product') }}</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</section>

<script type="module">
    import { animate, delay } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm";

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('#add-image-btn').addEventListener('click', (event) => {
            event.preventDefault();

            animate('#initial-form', { opacity: 0, display: 'none' }, { duration: 1 });

            delay(() => {
                document.querySelector('#add-image').classList.replace('hidden', 'flex');
                animate('#add-image', { opacity: [0, 1] }, { duration: 1 });
            }, 1)
        });

        document.querySelector('#back-btn').addEventListener('click', (event) => {
            event.preventDefault();

            animate('#add-image', { opacity: 0 }, { duration: 1 });

            delay(() => {
                document.querySelector('#add-image').classList.replace('flex', 'hidden');
                animate('#initial-form', { opacity: 1, display: 'flex' }, { duration: 1 });
            }, 1)
        });
    })

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