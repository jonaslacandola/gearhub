<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OfferHub') }}</title>

        <x-includes/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="w-full h-screen flex items-center bg-accent-gray antialiased">
        <div class="w-3/4 h-3/4 shadow-2xl rounded-3xl mx-auto flex flex-cols items-center gap-10 bg-background-light">
            @isset($sideboard)
                <div class="relative h-full w-full rounded-s-3xl bg-primary-orange">
                    {{ $sideboard }}
                </div>
            @endisset
            <div class="flex justify-center w-full ">
                {{ $slot }}
            </div>
        </div>

        <script>
            feather.replace();
        </script>
    </body>
</html>
