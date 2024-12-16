@props(['disabled' => false])

<div class="flex items-center gap-2 border border-zinc-300 rounded-md overflow-hidden py-2 px-3 focus-within:ring-2 focus-within:ring-orange-500 focus-within:ring-offset-2">
    {{ $slot }}
    <input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full border-none outline-none bg-transparent text-sm text-zinc-800 placeholder:text-zinc-300 placeholder:text-sm']) }}>
</div>
