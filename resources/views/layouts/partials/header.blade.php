<header x-data="{ scrolled: false }" x-init="$watch('scroll', () => scrolled = window.scrollY > 0)" class="fixed w-full bg-white/80 backdrop-blur-md z-50 shadow-lg transition-all duration-300" :class="scrolled ? 'bg-white/95' : 'bg-white/80'">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17L12 12L2 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 22V12L2 7V17L12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
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

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>