<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--  <!-- Fonts --> --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <!-- Scripts --> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--  <!-- Styles --> --}}
    @livewireStyles
    <link rel="favicon" href={{ asset('favicon.ico') }} type="image/ico">
</head>

<body class="font-sans antialiased darkMode">
    <x-banner />

    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <main class="w-full">
            @if (isset($header))
                <hr class="w-full">
                <header class="bg-white dark:bg-gray-800 shadow flex items-start">
                    <div class="py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>