@props(['active', 'icon'])

@php
$class = ($active ?? false) 
            ? 'p-2 rounded-full bg-accent-gray focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2' 
            : 'p-2 rounded-full hover:bg-accent-gray focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2';
@endphp

<a {{$attributes->merge(['class' => $class])}}>
    <i data-feather="{{ $icon }}" class="stroke-zinc-600 w-[20px] h-[20px]"></i>
    {{ $slot }}
</a>