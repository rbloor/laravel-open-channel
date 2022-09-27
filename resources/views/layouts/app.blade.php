<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    @include('partials.header')

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <div class="transform -rotate-90 fixed translate-x-14 right-0 top-3/4">
        <x-atom.button class="uppercase rounded-t-xl" color="theme-blue" href="{{ route('feedback.create') }}" size="large">Contact Us</x-atom.button>
    </div>

    @include('partials.footer')

    @stack('modals')

    @livewireScripts
</body>

</html>