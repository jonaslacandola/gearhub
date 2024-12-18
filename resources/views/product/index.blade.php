<x-admin-layout>
    <div class="w-[90%] mx-auto flex items-center gap-4">
        <!-- Search Form -->
        <form action="{{ route('admin.product.index') }}" method="get" class="flex items-center gap-4 flex-grow">
            <x-text-input type="search" name="search" id="search" value="{{ old('search', $search) }}" placeholder="Search product" class="flex-grow">
                <i data-feather="search" class="w-[18px] h-[18px] stroke-zinc-500"></i>
            </x-text-input>
        </form>
        <!-- Checkbox for Table View -->
        <div class="flex items-center bg-orange-50 rounded-md cursor-pointer">
            <input type="radio" name="table-view" id="table-view" class="hidden peer/table" checked/>
            <label for="table-view" 
                class="flex items-center justify-center border-2 border-transparent rounded-md p-2 cursor-pointer peer-checked/table:bg-orange-100 peer-checked/table:border-orange-500">
                <i data-feather="table" class="stroke-orange-500"></i>
            </label>
            <input type="radio" name="card-view" id="card-view" class="hidden peer/card" />
            <label for="card-view" 
                class="flex items-center justify-center border-2 border-transparent rounded-md p-2 cursor-pointer peer-checked/card:bg-orange-100 peer-checked/card:border-orange-500">
                <i data-feather="grid" class="stroke-orange-500"></i>
            </label>
        </div>
        <!-- More -->
        <div class="flex items-center gap-4">
            <button class="p-2 bg-zinc-100 rounded-md">
                <i data-feather="more-horizontal" class="stroke-zinc-500"></i>
            </button>
        </div>
        <!-- Add Product Form -->
        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-product')" class="text-sm">
            {{ __('Add Product') }}
        </x-primary-button>
        <x-modal name="create-product" focusable>
            <button class="m-4" x-on:click.prevent="$dispatch('close-modal', 'create-product')">
                <i data-feather="x" class="w-[18px] h-[18px] stroke-zinc-500"></i>
            </button>
            <div class="px-8 pb-8 max-h-[544px] overflow-y-auto">
                @include('product.create', ['categories' => $categories])
            </div>
        </x-modal>
    </div>

    <livewire:table-view :products="$products"/>
</x-admin-layout>