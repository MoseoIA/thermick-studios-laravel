<footer class="bg-primary text-light-text py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Column 1: Logo and Tagline -->
            <div class="text-center md:text-left">
                <svg class="font-serif" width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto md:mx-0 mb-4">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17L12 12L2 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 22V12L2 7V17L12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p class="text-light-text mb-4">Capturando momentos inolvidables con pasión y creatividad.</p>
            </div>

            <!-- Column 2: Explorar -->
            <div>
                <h3 class="font-serif text-lg font-semibold mb-4">Explorar</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="{{ route('home') }}" class="font-sans hover:text-accent">Inicio</a></li>
                    <li><a href="#" class="font-sans hover:text-accent">Portafolio</a></li>
                    <li><a href="#" class="font-sans hover:text-accent">Sobre Mí</a></li>
                    <li><a href="#" class="font-sans hover:text-accent">Contacto</a></li>
                </ul>
            </div>

            <!-- Column 3: Contacto -->
            <div>
                <h3 class="font-serif text-lg font-semibold mb-4">Contacto</h3>
                <p class="text-light-text mb-4">info@thermickstudios.com</p>
                <p class="text-light-text mb-4">+52 55 1234 5678</p>
                <div class="flex space-x-4">
                    <a href="#" class="font-sans text-primary hover:text-accent">Facebook</a>
                    <a href="#" class="text-white hover:text-blue-400">Instagram</a>
                    <a href="#" class="text-white hover:text-blue-400">Twitter</a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p class="font-sans">&copy; {{ date('Y') }} Thermick Studios. Todos los derechos reservados.</p>
            <p class="mt-2">
                <a href="#" class="font-sans hover:text-accent">Área de Clientes</a>
            </p>
        </div>
    </div>
</footer>