<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            body {
                font-family: 'figtree', sans-serif;
                background-color: #c9d6ff;
                background: linear-gradient(to right, #e2e2e2, #c9d6ff);
                color: #374151; /* Ubah sesuai kebutuhan */
            /* Anda juga dapat menyesuaikan properti lainnya */
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex sm:justify-center items-center pt-6 sm:pt-6">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden bg-white sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
