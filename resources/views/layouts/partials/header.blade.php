<header class="fixed w-full bg-white/80 backdrop-blur-md z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Thermick Studios" class="h-8 w-auto">
                <span class="ml-2 text-xl font-bold text-gray-900">Thermick Studios</span>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Inicio</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Portafolio</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Sobre Mí</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Contacto</a>
            </nav>

            <!-- Cotizar Evento Button -->
            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">
                Cotizar Evento
            </a>
        </div>
    </div>
</header>