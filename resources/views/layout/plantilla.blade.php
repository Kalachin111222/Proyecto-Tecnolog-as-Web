<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Ennita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex flex-col pt-16" style="background-color: var(--bg-primary); color: var(--text-primary);">
    <h1 class="sr-only">Supermercado - Venta de licores y productos</h1>
    <header class="header-fixed fixed top-0 left-0 right-0 z-50 w-full p-2 min-h-[64px] flex justify-between items-center shadow-lg md:grid md:grid-cols-3 md:gap-4">

        <!-- Columna 1: Hamburger (móvil) + Logo (siempre) -->
        <div class="flex items-center md:justify-self-start">
            <button id="hamburgerBtn" class="md:hidden text-white text-2xl icon-button p-2" aria-label="Menú principal">
                <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <a href="{{ route('inicio') }}" class="icon-button inline-block ml-2 md:ml-0">
                <img src="./imagenes/logo.png" alt="Logo" class="h-12 w-auto">
            </a>
        </div>

        <!-- Columna 2: Buscador (solo desktop) -->
        <div class="flex items-center justify-center w-full max-md:hidden">
            <div class="relative w-full md:max-w-md lg:max-w-3xl xl:max-w-4xl">
                <input type="search" data-translate="nav.search" placeholder="Buscar productos..." 
                    class="caja-busqueda p-3 pl-12 pr-4 text-base w-full rounded-lg border border-gray-600 h-11" 
                    style="background-color: var(--busqueda); color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Columna 3: Cuenta y carrito (solo desktop) -->
        <div class="flex flex-nowrap items-center justify-end text-white gap-4 md:justify-self-end max-md:hidden">
            <a href="{{route('cuenta')}}" class="no-underline text-white flex items-center gap-2 icon-button hover:text-yellow-300 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span data-translate="nav.account">Mi cuenta</span>
            </a>
            <a href="{{route('carrito')}}" class="no-underline text-white flex items-center gap-2 icon-button hover:text-yellow-300 transition-colors">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold">0</span>
                </div>
                <span data-translate="nav.cart">Carrito (S/ 0.00)</span>
            </a>
        </div>

    </header>

    <div id="hamburgerMenu" class="fixed top-0 left-0 h-full w-80 bg-white dark:bg-gray-800 shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out z-50 overflow-y-auto" style="background-color: var(--border-color);">
        <div class="p-6">
            <div class="flex justify-between items-center mb-8 border-b pb-4" style="border-color: var(--border-color);">
                <h2 class="text-xl font-bold" style="color: var(--text-primary);" data-translate="nav.menu">Menú</h2>
                <button id="closeMenuBtn" class="text-2xl" style="color: var(--text-primary);">×</button>
            </div>
            
            <div class="mb-6 md:hidden">
                <div class="relative">
                    <input type="search" aria-label="Buscar productos"  data-translate="nav.search" placeholder="Buscar productos..." class="w-full p-3 pl-12 rounded-lg border" style="background-color: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            
            <div class="space-y-4 mb-8">
                <div id="usuario-info-mobile">
                    <a href="cuenta.html" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span class="font-semibold" data-translate="nav.account">Mi Cuenta</span>
                    </a>
                </div>
                <div class="cuenta-carrito">
                    <a href="carrito.html" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span class="font-semibold" data-translate="nav.cart">Carrito (S/ 0.00)</span>
                    </a>
                </div>
            </div>
            
            <div class="border-t pt-6" style="border-color: var(--border-color);">
                <h3 class="text-lg font-bold mb-4" style="color: var(--text-primary);" data-translate="nav.categories">Categorías</h3>
                <div class="space-y-3">
                    <a href="" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.home">Inicio</span>
                    </a>
                    <a href="{{ route('cervezas') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.beers">Cervezas</span>
                    </a>
                    <a href="{{ route('licores') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.liquors">Licores</span>
                    </a>
                    <a href="{{ route('comidas') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.food">Comidas</span>
                    </a>
                    <a href="{{ route('bebidas') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.drinks">Bebidas</span>
                    </a>
                    <a href="{{ route('antojos') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.snacks">Antojos</span>
                    </a>
                    <a href="{{ route('helados') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.icecream">Helados</span>
                    </a>
                    <a href="{{ route('despensa') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors" style="color: var(--text-primary);">
                        <span data-translate="nav.pantry">Despensa</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="menuOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300"></div>

    <div class="flex-1">
        @yield('contenido')
    </div>

    <footer class="text-center relative w-full">
        <div class="px-5 mb-12 mt-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5 max-w-screen-xl mx-auto">
                <div class="m-2 flex flex-col text-left text-sm" style="color: var(--text-primary);">
                    <img src="./imagenes/logo.png" alt="Logo del supermercado" class="h-auto w-52">
                </div>
                <div class="m-2 flex flex-col text-left text-sm" style="color: var(--text-primary);">
                    <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary);" data-translate="footer.knowUs">Conócenos</h3>
                    <a href="Nosotros.html" class="no-underline mt-2" style="color: var(--text-primary);" data-translate="footer.whoWeAre">Quienes somos</a>
                    <p class="mt-2" style="color: var(--text-primary);" data-translate="footer.email"data-translate="footer.email">Email: contacto@ennita.pe</p>
                    <a href="Contacto.html" class="no-underline mt-2" style="color: var(--text-primary);" data-translate="footer.complaints">Libro de Reclamaciones</a>
                </div>
                <div class="m-2 flex flex-col text-left text-sm" style="color: var(--text-primary);">
                    <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary);" data-translate="footer.socialMedia">Redes Sociales</h3>
                    <a href="https://www.facebook.com/" class="no-underline mt-2" style="color: var(--text-primary);">Facebook</a>
                    <a href="https://www.instagram.com/" class="no-underline mt-2" style="color: var(--text-primary);">Instagram</a>
                    <a href="https://x.com/" class="no-underline mt-2" style="color: var(--text-primary);">Twitter</a>
                </div>
                <div class="m-2 flex flex-col text-left text-sm" style="color: var(--text-primary);">
                    <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary);" data-translate="footer.location">Ubicación</h3>
                    <p class="mt-2" style="color: var(--text-primary);" data-translate="footer.address">Avenida España 123, Trujillo</p>
                    <p class="mt-2" style="color: var(--text-primary);" data-translate="footer.schedule">Horario: Lunes a Sábado, 8:00 AM - 9:00 PM</p>
                </div>
            </div>
        </div>
        <div class="text-white text-center p-5 relative w-full" style="background-color: var(--color-header);">
            <p class="text-white" data-translate="footer.rights">&copy; 2025 Supermercado - Todos los derechos reservados</p>
            <div class="flex justify-center flex-wrap mt-2 gap-2">
                <a href="#" class="text-white no-underline hover:underline" data-translate="footer.privacy">Política de privacidad</a>
                <a href="#" class="text-white no-underline hover:underline" data-translate="footer.terms">Términos de servicio</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>