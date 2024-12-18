@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm mb-2 text-zinc-600']) }}>
    {{ $value ?? $slot }}
</label>
