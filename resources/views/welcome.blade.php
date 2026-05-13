@extends('layout.plantilla')
@section('title', 'D\'Ennita')

@section('contenido')
<section class="w-full overflow-hidden relative carousel-pause z-10 !h-64 md:!h-96 lg:!h-[600px]" id="carousel">
        <div class= "relative w-full h-full bg-gray-200 dark:bg-gray-800 transition-colors duration-300 z-10 ">
            <div class="flex h-full transition-transform duration-500 ease-out z-10" style="width: 300%;" id="carouselImages">
                <a class="w-1/3 h-full relative overflow-hidden group" href="{{route('comidas')}}">
                    <img src="./imagenes/bienvenido.png" alt="Imagen 1" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105 max-md:hidden">
                    <img src="./imagenes/bienvenido-small.png" alt="Imagen 1" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105 md:hidden">

                </a>
                <a class="w-1/3 h-full relative overflow-hidden group" href="{{route('cervezas')}}">
                    <img src="./imagenes/banner1.png" alt="Imagen 2" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105 max-md:hidden">
                    <img src="./imagenes/banner1-small.png" alt="Imagen 2" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105 md:hidden">
                </a>
                <a class="w-1/3 h-full relative overflow-hidden group" href="{{route('bebidas')}}">
                    <img src="./imagenes/banner2.png" alt="Imagen 3" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105 max-md:hidden">
                    <img src="./imagenes/banner2-small.png" alt="Imagen 3" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105 md:hidden">
                </a>
            </div>
            

            <button id="prevBtn" aria-label="Anterior" class="absolute z-10 flex items-center justify-center w-12 h-12 transition-all -translate-y-1/2 rounded-full cursor-pointer top-1/2 left-4 shadow-md border hover:scale-110 bg-white text-orange-600 border-gray-200 hover:bg-gray-50 dark:bg-gray-900 dark:text-orange-400 dark:border-gray-700 dark:hover:bg-black dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>

            <button id="nextBtn" aria-label="Siguiente" class="absolute z-10 flex items-center justify-center w-12 h-12 transition-all -translate-y-1/2 rounded-full cursor-pointer top-1/2 right-4 shadow-md border hover:scale-110 bg-white text-orange-600 border-gray-200 hover:bg-gray-50 dark:bg-gray-900 dark:text-orange-400 dark:border-gray-700 dark:hover:bg-black dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>

            <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex gap-4 z-10" id="carouselIndicators">
                <div class="w-3 h-3 rounded-full bg-white dark:bg-gray-300 bg-opacity-50 dark:bg-opacity-50 cursor-pointer relative transition-all duration-300 hover:bg-opacity-80 hover:scale-110 indicator active" data-slide="0">
                    <div class="absolute top-0 left-0 h-full w-full origin-left bg-black dark:bg-gray-800 rounded-full transition-all duration-100 progress-bar"></div>
                </div>
                <div class="w-3 h-3 rounded-full bg-white dark:bg-gray-300 bg-opacity-50 dark:bg-opacity-50 cursor-pointer relative transition-all duration-300 hover:bg-opacity-80 hover:scale-110 indicator" data-slide="1">
                    <div class="absolute top-0 left-0 h-full w-full origin-left bg-black dark:bg-gray-800 rounded-full transition-all duration-100 progress-bar"></div>
                </div>
                <div class="w-3 h-3 rounded-full bg-white dark:bg-gray-300 bg-opacity-50 dark:bg-opacity-50 cursor-pointer relative transition-all duration-300 hover:bg-opacity-80 hover:scale-110 indicator" data-slide="2">
                    <div class="absolute top-0 left-0 h-full w-full origin-left bg-black dark:bg-gray-800 rounded-full transition-all duration-100 progress-bar"></div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="navegador flex justify-center items-center mt-6 mb-12 overflow-x-auto transition-all duration-300 ease-in-out max-md:hidden" id="navegador" style="background-color: var(--bg-primary); ">
        <nav>
            <ul class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-8 gap-2 p-2 list-none">
                
                <li class="flex flex-col items-center text-center text-sm">
                    <a href="" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Inicio.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.home">Inicio</span>
                    </a>
                </li>

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{ route('cervezas') }}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Cervezas.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.beers">Cervezas</span>
                    </a>
                </li>

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{ route('licores') }}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Licores.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.liquors">Licores</span>
                    </a>
                </li>

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{ route('comidas') }}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Comidas.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.food">Comidas</span>
                    </a>
                </li>

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{ route('bebidas') }}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Bebidas.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.drinks">Bebidas</span>
                    </a>
                </li>

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{ route('antojos') }}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Antojos.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.snacks">Antojos</span>
                    </a>
                </li>

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{ route('helados') }}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Helados.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.icecream">Helados</span>
                    </a>
                </li>

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{route('despensa')}}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/Despensa.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.pantry">Despensa</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

    <main class="p-5 flex-grow flex flex-col" style="background-color: var(--bg-secondary);">
        <div class="max-w-screen-xl mx-auto w-full">

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.beers">Cervezas</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16 ">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col " style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Cervezas1.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Cerveza Tres Cruces Lager Six Pack Lata 355ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 24.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Cervezas2.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Cerveza De Malta Y Maiz Dragenburg Sixpack 310 Ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 18.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Cervezas3.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Cerveza Coronita Six Pack Botella 210 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 20.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Cervezas4.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Cerveza Heineken Fourpack Lata 473 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 27.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Cervezas5.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Cerveza Tres Cruces Light Six Pack Lata X 310 Ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 23.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Cervezas6.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Cerveza Pilsen Callao Six Pack Lata 355 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 28.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000" onclick="window.location.href='{{ route('cervezas') }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>
            </section>

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.liquors">Licores</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col " style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores1.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 2 Cartavio Añejo Black 1L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 72.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores2.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 2 Ron Black Barrel 1L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 91.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores3.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 2 Ron Cartavio Añejo Black 750ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 62.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores4.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 2 Vodka Russkaya Apple 750ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 53.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores5.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Ron Cartavio Black 1 L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores6.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Ron Cartavio Black 750 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 29.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000" onclick="window.location.href='{{ route('licores') }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>
            </section>

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.food">Comidas</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas1.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Hamburguesa Prime de Cerdo Miel de Maple 1 und</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 12.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas2.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (3 Empanada De Carne + 3 Empanada De Pollo + 1 Coca Cola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 25.60</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas3.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Sandwich Prime Pulled Pork</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 12.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas4.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Hamburguesa Prime de Res Tocino Queso 1 und</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 12.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas5.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (5 Empanada De Carne + 5 Empanada De Pollo + 1 Coca Cola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 39.20</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas6.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (10 Empanada De Carne)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000" onclick="window.location.href='{{ route('comidas') }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>
            </section>

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.drinks">Bebidas</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Bebidas1.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (1 Rehidratante Life SOS Recovery Sabor Tropical + 1 Rehidratante Life SOS Relax Sabor Mix de Frutas) Lata 355ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 11.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Bebidas2.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Coca Cola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.40</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Bebidas3.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (3 Schweppes Ginger Ale x 1.5 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 23.70</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Bebidas4.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (4 Coca Cola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 20.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Bebidas5.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (4 Inca Kola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 20.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Bebidas6.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Energizante Red Bull Sugar Free x 250 Ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 17.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000" onclick="window.location.href='{{ route('bebidas') }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>
            </section>

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.snacks">Antojos</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos1.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Inka Chips Jalapeño x 135 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 17.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos2.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Inka Chips Queso Y Cebolla x 135 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 17.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos3.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 1 (Keke Pinguino Marinela Cookies Cream 80gr + Keke Pinguino Marinela Triple Chocolate 80gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 8.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos4.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 2 (Papas Kona Select Original 100 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos5.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Papas Jappy Snacks BBQ 200 gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos6.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Papas Jappy Snacks Jalapeño 200 gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000" onclick="window.location.href='{{ route('antojos') }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>
            </section>

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.icecream">Helados</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados1.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Helado grand Prix Bombones 216 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados2.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Helado Donofrio Peziduri Tricolor Cremoso 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.99</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados3.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Helado Donofrio Peziduri Chocochips Cremoso 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.99</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados4.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Helado Donofrio Peziduri Vainilla Cremoso 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.99</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados5.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Helado Gelático Chocobrownie 450ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 7.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados6.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Helado Gelatico Chocochips 930 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000" onclick="window.location.href='{{ route('helados') }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>
            </section>

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.pantry">Despensa</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Despensa1.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Huevo Pardo La Calera x 15 Und)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 23.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Despensa2.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (3 Bebida Láctea Uht Gloria Pro Triple Zero Chocolate 320 Ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 18.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Despensa3.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Keke Bimbo Marmoleado Familiar 380 gr</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.50</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Despensa4.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Keke Bimbo Naranja Familiar 380 gr</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.50</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Despensa5.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Leche UHT Gloria Entera 1 L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 5.70</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Despensa6.png" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Bebida Láctea Pro UHT Chocolate 320 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 5.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000" onclick="window.location.href='{{ route('despensa') }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>
            </section>

        </div>

    </main>


@endsection