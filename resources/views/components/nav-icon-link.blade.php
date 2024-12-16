@props(['active', 'icon'])

@php
$class = ($active ?? false) 
            ? 'relative p-2 rounded-full bg-zinc-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2' 
            : 'relative p-2 rounded-full hover:bg-zinc-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2';
@endphp

<a {{$attributes->merge(['class' => $class])}}>
    <i data-feather="{{ $icon }}" class="stroke-zinc-600 w-[20px] h-[20px]"></i>
    {{ $slot }}
</a>