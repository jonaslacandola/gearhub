<nav class="w-full sticky top-0 p-4 bg-background-light border-b border-accent-gray shadow-md z-50">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
</nav>