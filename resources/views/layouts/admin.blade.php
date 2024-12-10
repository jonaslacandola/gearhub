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
    <body class="w-full h-screen bg-background-light antialiased">
        @include('layouts.navigation')

        <main class="max-w-[75%] mx-auto py-10 flex flex-col gap-16">
            {{ $slot }}
        </main>

        <script> 
            feather.replace();
        </script>
        @livewireScripts 
    </body>
</html>
