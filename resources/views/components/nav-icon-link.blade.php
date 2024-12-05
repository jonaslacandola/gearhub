@props(['active', 'icon', 'count'])

@php
$class = ($active ?? false) 
            ? 'relative p-2 rounded-full bg-accent-gray focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2' 
            : 'relative p-2 rounded-full hover:bg-accent-gray focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2';
@endphp

<a {{$attributes->merge(['class' => $class])}}>
    <i data-feather="{{ $icon }}" class="stroke-zinc-600 w-[20px] h-[20px]"></i>
    {{ $slot }}
    @isset($count)
        <p class="absolute text-[8px] -top-2 -right-2 px-2 py-1 bg-red-600 text-red-50 rounded-full">{{ strval($count) }}</p>
    @endisset
</a>