<div class="border-collapse w-full max-w-[90%] flex flex-col bg-white mx-auto border border-zinc-200 rounded-lg">
    <div class="grid grid-cols-[0.2fr_0.8fr_0.5fr_0.4fr_0.4fr_0.4fr_0.2fr] p-4">
        <p></p>
        <p class="text-zinc-400 text-sm text-left font-medium">Product</th>
        <p class="text-zinc-400 text-sm text-left font-medium">Category</th>
        <p class="text-zinc-400 text-sm text-left font-medium">Price</th>
        <p class="text-zinc-400 text-sm text-left font-medium">Stock</th>
        <p class="text-zinc-400 text-sm text-left font-medium">Created At</th>
        <p></p>
    </div>
    @forelse ($products as $product)
        <div class="grid grid-cols-[0.2fr_0.8fr_0.5fr_0.4fr_0.4fr_0.4fr_0.2fr] p-4 items-center even:border-t border-zinc-300 even:bg-zinc-100 hover:bg-orange-100">
            <div  class="text-zinc-600 text-sm text-left font-normal">
                <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-md">
            </div >
            <div  class="text-zinc-600 text-sm text-left font-normal">{{ $product->name }}</div >
            <div  class="text-zinc-600 text-sm text-left font-normal">{{ $product->category->name }}</div >
            <div  class="text-zinc-600 text-sm text-left font-normal">&#8369; {{ number_format($product->price, 2, '.', ',') }}</div >
            <div  class="text-green-500 text-sm text-left font-medium">{{ $product->stock }} in Stock</div >
            <div  class="text-zinc-600 text-sm text-left font-normal">{{ $product->created_at->format('M d, Y') }}</div >
            <div >
                <div class="flex items-center gap-4">
                    <button>
                        <i data-feather="edit-2" class="w-[18px] h-[18px] stroke-zinc-500"></i>
                    </button>
                    <button x-data="{ productId: {{ $product->id }} }" x-on:click.prevent="$dispatch('open-modal', 'delete-product-{{ $product->id }}')">
                        <i data-feather="trash" class="w-[18px] h-[18px] stroke-zinc-500"></i>
                    </button>
                </div>
            </div >
        </div>
        <x-modal name="delete-product-{{ $product->id }}" x-data="{ productId: null }" focusable>
        <form action="{{ route('admin.product.delete', ['product' => $product->id]) }}" method="post" class="flex flex-col gap-4 p-8">
            @csrf
            @method('DELETE')
            <h1 class="">Delete Product {{ $product->name }}</h1>
            <p class="text-sm text-zinc-600">Are you sure you want to delete this product? This action's cannot be undone.</p>
            <div class="flex items-center justify-end gap-2">
                <x-secondary-button x-on:click.prevent="$dispatch('close-modal', 'delete-product-{{ $product->id }}')" type="reset" class="text-sm">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button type="submit" class="text-sm">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    @empty
        <p class="text-center text-sm text-zinc-400 p-4 border-t border-zinc-300">Oops, There are no products to show</p>
    @endforelse
    <div class="border-t border-zinc-300 p-4">
    </div>
</div>