<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center text-center px-4 py-2 bg-primary-orange border border-transparent rounded-md text-white focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
