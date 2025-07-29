<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JobConnect') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind & App Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans antialiased">

    {{-- Optional: custom navbar --}}
    @include('partials.pages-navbar')

    {{-- Page header if provided --}}
    @isset($header)
        <header class="bg-[#111] shadow-md border-b border-gray-800">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Main page content --}}
    <main class="min-h-screen pt-6 px-4">
        @yield('content')
    </main>

    {{-- Optional: custom footer --}}
    <footer class="bg-[#111] text-center text-gray-400 py-4 mt-12 border-t border-gray-700">
        <p>&copy; {{ date('Y') }} JobConnect Kenya. All rights reserved.</p>
    </footer>

</body>
</html>
