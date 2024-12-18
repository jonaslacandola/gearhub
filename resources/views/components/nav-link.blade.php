@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 px-4 py-3 bg-orange-100 text-orange-500 rounded-lg'
            : 'flex items-center gap-2 px-4 py-3 text-zinc-500 rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
