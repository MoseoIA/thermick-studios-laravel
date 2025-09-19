<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Column 1: Logo and Tagline -->
            <div class="text-center md:text-left">
                <img src="{{ asset('images/logo.png') }}" alt="Thermick Studios" class="h-12 w-auto mb-4 mx-auto md:mx-0">
                <p class="text-gray-300 mb-4">Capturando momentos inolvidables con pasión y creatividad.</p>
            </div>

            <!-- Column 2: Explorar -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Explorar</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400">Inicio</a></li>
                    <li><a href="#" class="hover:text-blue-400">Portafolio</a></li>
                    <li><a href="#" class="hover:text-blue-400">Sobre Mí</a></li>
                    <li><a href="#" class="hover:text-blue-400">Contacto</a></li>
                </ul>
            </div>

            <!-- Column 3: Contacto -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                <p class="text-gray-300 mb-4">info@thermickstudios.com</p>
                <p class="text-gray-300 mb-4">+52 55 1234 5678</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-blue-400">Facebook</a>
                    <li><a href="#" class="text-white hover:text-blue-400">Instagram</a></li>
                    <li><a href="#" class="text-white hover:text-blue-400">Twitter</a></li>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Thermick Studios. Todos los derechos reservados.</p>
            <p class="mt-2">
                <a href="#" class="hover:text-blue-400">Área de Clientes</a>
            </p>
        </div>
    </div>
</footer>