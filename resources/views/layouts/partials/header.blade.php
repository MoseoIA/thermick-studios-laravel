<header x-data="{ scrolled: false }" x-init="$watch('scroll', () => scrolled = window.scrollY > 0)" class="fixed w-full bg-primary/80 backdrop-blur-md z-50 shadow-lg transition-all duration-300" :class="scrolled ? 'bg-primary/95' : 'bg-primary/80'">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17L12 12L2 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 22V12L2 7V17L12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="font-serif ml-2 text-xl font-bold text-primary">Thermick Studios</span>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="font-sans text-light-text hover:text-accent">Inicio</a>
                <a href="#" class="font-sans text-light-text hover:text-accent">Portafolio</a>
                <a href="#" class="font-sans text-light-text hover:text-accent">Sobre Mí</a>
                <a href="#" class="font-sans text-light-text hover:text-accent">Contacto</a>
            </nav>

            <!-- Cotizar Evento Button -->
            <a href="#" class="bg-accent hover:bg-accent-dark text-primary px-4 py-2 rounded-md font-semibold">
                Cotizar Evento
            </a>
        </div>
    </div>
</header>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>