<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-50 to-indigo-50">
            <div class="bg-white/80 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-8 shadow-lg text-center">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mb-2">Hello, World!</h1>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 mb-4">
                    Welcome to your Tailwind + Laravel app.
                </p>
                <a href="#" class="inline-block px-5 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded-md font-medium">
                    Get started
                </a>
            </div>
        </div>
    </body>
</html>
