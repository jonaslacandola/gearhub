<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Borel&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Feather Icon -->
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

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
