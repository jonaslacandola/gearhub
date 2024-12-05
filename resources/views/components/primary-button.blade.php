@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-center px-4 py-2 bg-primary-orange border border-transparent rounded-md text-white active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2 disabled:bg-accent-gray']) }} @if($disabled) disabled @endif>
    {{ $slot }}
</button>
