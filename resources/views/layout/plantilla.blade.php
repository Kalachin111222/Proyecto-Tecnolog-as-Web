<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('imagenes/Nosotros.png') }}">
    <title>@yield('title')</title>
    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1 class="visually-hidden">Supermercado - Venta de licores y productos</h1>

    {{-- ===== NAVBAR ===== --}}
    <header class="header-fixed fixed-top d-flex align-items-center justify-content-between px-3 py-2">

        {{-- Columna 1: Hamburger + Logo --}}
        <div class="d-flex align-items-center">
            <button class="d-md-none icon-button text-white me-2 p-2" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#menuOffcanvas"
                    aria-label="Menú principal">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:28px;height:28px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <a href="{{ route('inicio') }}" class="icon-button d-inline-block">
                <img src="{{ asset('imagenes/logo.png') }}" alt="Logo" style="height:48px;width:auto;">
            </a>
        </div>

        {{-- Columna 2: Buscador (solo desktop) --}}
        <div class="d-none d-md-flex flex-grow-1 justify-content-center mx-4" style="max-width:640px;">
            <div class="position-relative w-100">
                <input type="search" data-translate="nav.search" placeholder="Buscar productos..."
                    class="caja-busqueda w-100">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:24px;height:24px;position:absolute;left:12px;top:50%;transform:translateY(-50%);" class="text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        {{-- Columna 3: Cuenta y Carrito (solo desktop) --}}
        <div class="d-none d-md-flex align-items-center gap-4 text-white">

            {{-- Dropdown Cuenta --}}
            <div class="dropdown-hover-wrapper position-relative">
                @if(session('usuario') && session('usuario') !== 'invitado')
                <button class="icon-button text-white d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:24px;height:24px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span data-translate="nav.account">Mi cuenta</span>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                @else
                <a href="{{ route('login') }}" class="text-white text-decoration-none d-flex align-items-center gap-2 icon-button">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:24px;height:24px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Iniciar sesión</span>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                @endif

                @if(session('usuario') && session('usuario') !== 'invitado')
                <div class="dropdown-menu-hover">
                    <a href="{{ route('cuenta') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Mi cuenta
                    </a>
                    <div style="border-top:1px solid var(--border-color);"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Cerrar sesión
                        </button>
                    </form>
                </div>
                @endif
            </div>

            {{-- Carrito con preview hover --}}
            <div class="carrito-preview-wrapper position-relative">
                <a href="{{ route('carrito') }}" class="text-white text-decoration-none d-flex align-items-center gap-2 icon-button">
                    <div class="position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:24px;height:24px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span id="carrito-badge">0</span>
                    </div>
                    <span id="carrito-total" data-translate="nav.cart">Carrito (S/ 0.00)</span>
                </a>

                {{-- Preview carrito --}}
                <div id="carrito-preview">
                    <div class="p-3 fw-semibold small border-bottom" style="color:var(--text-primary);border-color:var(--border-color)!important;">
                        🛒 Productos en el carrito
                    </div>
                    <div id="carrito-preview-items" style="max-height:256px;overflow-y:auto;">
                        <p class="text-center small py-4" style="color:var(--text-secondary);">El carrito está vacío</p>
                    </div>
                    <div class="p-3 border-top d-flex justify-content-between align-items-center" style="border-color:var(--border-color)!important;">
                        <span class="fw-semibold small" style="color:var(--text-primary);">Total:</span>
                        <span id="carrito-preview-total" class="fw-bold" style="color:var(--text-primary);">S/ 0.00</span>
                    </div>
                    <div class="p-3 pt-0">
                        <a href="{{ route('carrito') }}" class="d-block w-100 text-center py-2 rounded text-decoration-none text-white small fw-semibold"
                           style="background-color:var(--accent-color);">Ver carrito completo</a>
                    </div>
                </div>
            </div>

        </div>
    </header>

    {{-- ===== OFFCANVAS (menú móvil) ===== --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="menuOffcanvas" aria-labelledby="menuOffcanvasLabel">
        <div class="offcanvas-header border-bottom" style="border-color:var(--border-color)!important;">
            <h5 class="offcanvas-title" id="menuOffcanvasLabel" data-translate="nav.menu">Menú</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
        </div>
        <div class="offcanvas-body">

            {{-- Buscador móvil --}}
            <div class="mb-4">
                <div class="position-relative">
                    <input type="search" aria-label="Buscar productos" data-translate="nav.search"
                           placeholder="Buscar productos..."
                           class="form-control ps-5"
                           style="background-color:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:20px;height:20px;position:absolute;left:12px;top:50%;transform:translateY(-50%);" class="text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>

            {{-- Cuenta --}}
            <div class="mb-3">
                @if(session('usuario') && session('usuario') !== 'invitado')
                    <a href="{{ route('cuenta') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1"
                       style="color:var(--text-primary);">
                        <span class="fw-semibold" data-translate="nav.account">Mi Cuenta</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="d-flex align-items-center p-3 rounded w-100 border-0 text-start mb-1"
                                style="background:none;color:var(--text-primary);">
                            <span class="fw-semibold">Cerrar sesión</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1"
                       style="color:var(--text-primary);">
                        <span class="fw-semibold">Iniciar sesión</span>
                    </a>
                @endif
                <a href="{{ route('carrito') }}" class="d-flex align-items-center p-3 rounded text-decoration-none"
                   style="color:var(--text-primary);">
                    <span class="fw-semibold" data-translate="nav.cart">Carrito (S/ 0.00)</span>
                </a>
            </div>

            <hr style="border-color:var(--border-color);">

            {{-- Categorías --}}
            <h6 class="fw-bold mb-3" style="color:var(--text-primary);" data-translate="nav.categories">Categorías</h6>
            <nav>
                <a href="" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.home">Inicio</span>
                </a>
                <a href="{{ route('cervezas') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.beers">Cervezas</span>
                </a>
                <a href="{{ route('licores') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.liquors">Licores</span>
                </a>
                <a href="{{ route('comidas') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.food">Comidas</span>
                </a>
                <a href="{{ route('bebidas') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.drinks">Bebidas</span>
                </a>
                <a href="{{ route('antojos') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.snacks">Antojos</span>
                </a>
                <a href="{{ route('helados') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.icecream">Helados</span>
                </a>
                <a href="{{ route('despensa') }}" class="d-flex align-items-center p-3 rounded text-decoration-none mb-1" style="color:var(--text-primary);">
                    <span data-translate="nav.pantry">Despensa</span>
                </a>
                <a href="{{ route('nosotros') }}" class="d-flex align-items-center p-3 rounded text-decoration-none" style="color:var(--text-primary);">
                    <span>Integrantes</span>
                </a>
            </nav>
        </div>
    </div>

    {{-- Contenido principal --}}
    <div class="flex-grow-1">
        @yield('contenido')
    </div>

    {{-- ===== FOOTER ===== --}}
    <footer class="text-center w-100">
        <div class="px-4 py-5">
            <div class="row g-4 justify-content-center" style="max-width:1280px;margin:auto;">
                <div class="col-12 col-sm-6 col-md-3 text-start" style="color:var(--text-primary);">
                    <img src="{{ asset('imagenes/logo.png') }}" alt="Logo del supermercado" style="width:208px;height:auto;">
                </div>
                <div class="col-12 col-sm-6 col-md-3 text-start" style="color:var(--text-primary);">
                    <h3 class="fs-6 fw-semibold mb-2" data-translate="footer.knowUs">Conócenos</h3>
                    <a href="{{ route('nosotros') }}" class="d-block mt-2 text-decoration-none" style="color:var(--text-primary);">Integrantes</a>
                    <p class="mt-2 mb-0" data-translate="footer.email">Email: contacto@ennita.pe</p>
                    <a href="Contacto.html" class="d-block mt-2 text-decoration-none" style="color:var(--text-primary);" data-translate="footer.complaints">Libro de Reclamaciones</a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 text-start" style="color:var(--text-primary);">
                    <h3 class="fs-6 fw-semibold mb-2" data-translate="footer.socialMedia">Redes Sociales</h3>
                    <a href="https://www.facebook.com/" class="d-block mt-2 text-decoration-none" style="color:var(--text-primary);">Facebook</a>
                    <a href="https://www.instagram.com/" class="d-block mt-2 text-decoration-none" style="color:var(--text-primary);">Instagram</a>
                    <a href="https://x.com/" class="d-block mt-2 text-decoration-none" style="color:var(--text-primary);">Twitter</a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 text-start" style="color:var(--text-primary);">
                    <h3 class="fs-6 fw-semibold mb-2" data-translate="footer.location">Ubicación</h3>
                    <p class="mt-2 mb-0" data-translate="footer.address">Avenida España 123, Trujillo</p>
                    <p class="mt-2 mb-0" data-translate="footer.schedule">Horario: Lunes a Sábado, 8:00 AM - 9:00 PM</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="text-white mb-1" data-translate="footer.rights">&copy; 2025 Supermercado - Todos los derechos reservados</p>
            <div class="d-flex justify-content-center flex-wrap gap-2">
                <a href="#" class="text-white text-decoration-none" data-translate="footer.privacy">Política de privacidad</a>
                <a href="#" class="text-white text-decoration-none" data-translate="footer.terms">Términos de servicio</a>
            </div>
        </div>
    </footer>

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    window.APP = {
        userId: {{ session('user_id') ?? 'null' }},
        usuario: '{{ session('usuario') ?? '' }}',
        rol: '{{ session('rol') ?? '' }}',
        csrfToken: '{{ csrf_token() }}'
    };
    </script>
</body>
</html>
