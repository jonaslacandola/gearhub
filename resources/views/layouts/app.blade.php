<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <x-includes/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="w-full h-screen bg-background-light antialiased">
            <nav class="w-full p-4 bg-background-light border-b border-accent-gray shadow-md">
                <ul class="grid grid-cols-[0.5fr_1fr_0.9fr] items-center gap-8 max-w-[80%] mx-auto">
                    <li>
                        <x-application-logo class="text-2xl pt-2"/>
                    </li>
                    <li >
                        <x-text-input>
                            <i data-feather="search" class="w-[18px] h-[18px]"></i>
                        </x-text-input>
                        <div></div>
                    </li>
                    <li class="justify-self-end flex flex-cols items-center gap-8">
                        <div class="flex flex-cols items-center gap-2">
                            <x-nav-icon-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="bell" />
                            <x-nav-icon-link :href="route('dashboard')" :active="request()->routeIs('')" icon="heart" />
                            <x-nav-icon-link :href="route('dashboard')" :active="request()->routeIs('')" icon="shopping-cart" />
                        </div>
                        <div>
                            @if (Auth::user())
                                <p class="text-sm text-zinc-600">{{Auth::user()->name}}</p>
                            @else 
                                <x-primary-button class="text-sm">
                                    {{ __('Register / Login') }}
                                </x-primary-button>
                            @endif
                        </div>
                    </li>
                </ul>
            </nav>

            <main class="max-w-[75%] mx-auto py-10 flex flex-col gap-16">
                {{ $slot }}
            </main>

        <script>
            feather.replace();
        </script>
    </body>
</html>
