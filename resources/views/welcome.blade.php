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
            @vite(['resources/css/app.css', 'resources/ts/app.ts'])
        @endif
    </head>
    <body>
        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-50 to-indigo-50 p-4">
            <div class="max-w-2xl w-full space-y-6">
                <!-- Main Card -->
                <div class="bg-white/80 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-8 shadow-lg text-center">
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mb-2">Hello, World!</h1>
                    <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 mb-4">
                        Welcome to your Tailwind + Laravel + Alpine.js app with TypeScript.
                    </p>
                    <a href="#" class="inline-block px-5 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded-md font-medium">
                        Get started
                    </a>
                </div>

                <!-- Alpine.js Counter Demo -->
                <div x-data="{ count: 0 }" class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Alpine.js Counter</h2>
                    <div class="flex items-center justify-center gap-4">
                        <button @click="count--" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                            -
                        </button>
                        <span x-text="count" class="text-3xl font-bold text-slate-900 min-w-[3rem] text-center"></span>
                        <button @click="count++" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg">
                            +
                        </button>
                    </div>
                </div>

                <!-- Alpine.js Toggle Demo -->
                <div x-data="{ isOpen: false }" class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Alpine.js Toggle</h2>
                    <button @click="isOpen = !isOpen" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded-lg">
                        <span x-text="isOpen ? 'Hide' : 'Show'"></span> Content
                    </button>
                    <div x-show="isOpen" x-transition class="mt-4 p-4 bg-sky-50 rounded-lg">
                        <p class="text-slate-700">This content is toggled with Alpine.js! 🎉</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="text-center text-xs text-slate-400 mt-4 mb-4">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </p>
        </div>
    </body>
</html>
