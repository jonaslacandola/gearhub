@props(['disabled' => false])

<div class="flex flex-cols items-center gap-2 border border-accent-gray rounded-md overflow-hidden py-2 px-3 focus-within:ring-2 focus-within:ring-primary-orange focus-within:ring-offset-2">
    {{ $slot }}
    <input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full border-none outline-none bg-transparent text-sm text-secondary-black placeholder:text-accent-gray placeholder:text-sm']) }}>
</div>
