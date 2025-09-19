<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4 border-b">
                <h1 class="text-xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="{{ route('testimonials.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <span class="ml-3">Testimonios</span>
                </a>
                <a href="{{ route('portfolio-categories.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <span class="ml-3">Categorías</span>
                </a>
                <a href="{{ route('portfolio-projects.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <span class="ml-3">Portafolio</span>
                </a>
                <a href="{{ route('client-galleries.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <span class="ml-3">Galerías de Clientes</span>
                </a>
                <a href="{{ route('portfolio-projects.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <span class="ml-3">Proyectos de Portafolio</span>
                </a>
                <!-- Add other links here as needed -->
                <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 mt-4">
                    <span class="ml-3">Profile</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="px-4 py-2 mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left text-gray-700 hover:bg-gray-100 py-2">Logout</button>
                </form>
            </nav>
        </div>
        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="text-xl font-semibold text-gray-900">@yield('header')</h2>
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>