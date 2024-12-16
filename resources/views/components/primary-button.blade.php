@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center text-center px-4 py-3 bg-gradient-to-r from-orange-500 to-orange-600 border border-transparent rounded-md text-white active:from-orange-600 active:to-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 disabled:bg-accent-gray']) }} @if($disabled) disabled @endif>
    {{ $slot }}
</button>
