<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RRHH') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">

    {{-- Mensajes de sesión --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4">
            <div class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded shadow-sm">
                ✅ {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto mt-4 px-4">
            <div class="flex items-center gap-2 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded shadow-sm">
                ❌ {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="min-h-screen flex flex-col">

        {{-- Navegación superior --}}
        @include('layouts.navigation')

        {{-- Encabezado dinámico --}}
        @isset($header)
            <header class="bg-white shadow-sm border-b">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Contenido principal --}}
        <main class="flex-1 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        {{-- Pie de página --}}
        <footer class="bg-white text-center text-sm text-gray-500 py-4 border-t">
            © {{ date('Y') }} RRHH - Sistema de Gestión
        </footer>
    </div>

    {{-- Alpine --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
