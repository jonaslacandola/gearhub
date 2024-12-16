@props(['categories', 'filter', 'minPrice', 'maxPrice'])

<form id="filter-box" action="{{ route('feed') }}" method="get" class="sticky flex flex-col gap-4 top-28 bg-white shadow rounded-lg h-[580px] px-8 py-6 -translate-x-36">
    <p class="text-xl">
        {{ __('Filter') }}
    </p>
    <div class="flex flex-col gap-2">
        <p>Categories</p>
        <div class="flex flex-col gap-2 px-2">
            @foreach($categories as $category)
            <div class="flex items-center gap-2">
                <input type="checkbox" name="{{ $category->name }}" id="{{ $category->name }}" value="{{ $category->id }}"          class="accent-orange-500" {{ in_array($category->id, $filter ?? []) ? 'checked' : '' }}>
                <label for="{{ $category->name }}" class="text-sm text-zinc-600">
                    {{ $category->name }}
                </p>
            </div>
            @endforeach
        </div>
        <p>Price Range</p>
        <div  class="flex flex-col gap-2 px-2">
            <label for="min_price" class="text-sm text-zinc-600">Minimum Price</label>
            <x-text-input type="number" name="min_price" id="min_price" value="{{ old('min_price', $minPrice) }}" placeholder="0"/>
            <label for="max_price" class="text-sm text-zinc-600">Maximum Price</label>
            <x-text-input type="number" name="max_price" id="max_price" value="{{ old('max_price', $maxPrice) }}" placeholder="100000"/>
        </div>
    </div>
    <div class="w-full flex items-center gap-2">
        <x-secondary-button type="reset" class="w-full text-sm">
            {{ __('Clear') }}
        </x-secondary-button>
        <x-primary-button type="submit" class="w-full text-sm">
            {{ __('Apply') }}
        </x-primary-button>
    </div>
</form>

<script type="module">
    import { animate, scroll } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm";

    document.addEventListener('DOMContentLoaded', () => {
        animate('#filter-box', {
            x: 0
        }, {
            delay: 1,
            ease: 'ease-in',
        });
    });

</script>