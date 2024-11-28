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
    <body class="w-full h-screen bg-accent-gray antialiased">
            <nav class="w-full flex items-center p-4 bg-white shadow-md">
                <x-application-logo class="text-2xl pt-2"/>

                <div class="">
                    <x-text-input></x-text-input>
                    <div></div>
                </div>


            </nav>

            <main>
                {{ $slot }}
            </main>

        <script> 
            feather.replace();
        </script>
    </body>
</html>
