<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="flex flex-col min-h-screen">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-8">
            <div class="relative h-16 flex justify-between">

                <!-- Logo -->
                <div class="relative z-10 px-2 flex lg:px-0">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <img class="h-5 block w-auto" src="{{ asset('img/canon-logo.png') }}" alt="Canon Open Channel" />
                        </a>
                    </div>
                </div>

                <!-- Menu -->
                <div class="mx-4 flex items-center">
                    <nav class="flex space-x-5 items-center">
                        @auth
                        <a href="{{ route('profile') }}" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Home</a>
                        @else
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Login</a>
                        @endif
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Register</a>
                        @endif
                        @endauth
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    @include('partials.footer')

    @livewireScripts

</body>

</html>