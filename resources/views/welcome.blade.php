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
            <ul class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-9 gap-2 p-2 list-none">
                
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

                <li class="flex flex-col items-center text-center text-sm">
                    <a href="{{route('nosotros')}}" class="flex flex-col items-center no-underline group">
                        <img src="./imagenes/Navegador/usuario.png" alt="" class="h-28 w-28 object-contain">
                        <span class="font-semibold mt-1" style="color: var(--text-producto);" data-translate="nav.pantry">Integrantes</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    
    <main class="p-5 flex-grow flex flex-col" style="background-color: var(--bg-secondary);">
        <div class="max-w-screen-xl mx-auto w-full">

            @php
                $categorias = [
                    'cervezas' => 'Cervezas',
                    'licores'  => 'Licores',
                    'comidas'  => 'Comidas',
                    'bebidas'  => 'Bebidas',
                    'antojos'  => 'Antojos',
                    'helados'  => 'Helados',
                    'despensa' => 'Despensa',
                ];
            @endphp

            @foreach($categorias as $slug => $titulo)
            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);">{{ $titulo }}</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5 mb-16">

                @foreach($productosPorCategoria[$slug]->take(6) as $producto)
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <a href="{{ route('producto', $producto->slug) }}" class="block">
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                            class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36 hover:scale-105 transition-transform" />
                    </a>
                    <a href="{{ route('producto', $producto->slug) }}" class="no-underline flex-grow">
                        <p class="text-base overflow-hidden text-left" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical; color: var(--text-primary);">
                            {{ $producto->nombre }}
                        </p>
                    </a>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ {{ number_format($producto->precio, 2) }}</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono"
                            aria-label="Añadir" data-producto-id="{{ $producto->id }}" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                @endforeach

                {{-- Ver más --}}
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <div class="rounded-md no-underline font-bold flex justify-center flex-col items-center w-full h-full gap-2">
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono"
                            aria-label="ver-mas"
                            style="background-color: var(--btnAgregar); color: #000000"
                            onclick="window.location.href='{{ route($slug) }}'">+</button>
                        <span data-translate="categories.seeMore">Ver más</span>
                    </div>
                </div>

            </section>
            @endforeach

        </div>
    </main>

@endsection
