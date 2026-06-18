@extends('layout.plantilla')
@section('title', 'D\'Ennita')

@section('contenido')

{{-- ===== CARRUSEL ===== --}}
<section id="carousel" class="w-100 overflow-hidden position-relative">
    <div class="position-relative w-100 h-100">
        <div id="carouselImages" style="width:300%;">
            <a class="h-100 overflow-hidden d-block" href="{{ route('comidas') }}" style="width:33.333%;">
                <img src="./imagenes/bienvenido.png"      alt="Imagen 1" class="w-100 h-100 object-fit-cover d-none d-md-block">
                <img src="./imagenes/bienvenido-small.png" alt="Imagen 1" class="w-100 h-100 object-fit-cover d-md-none">
            </a>
            <a class="h-100 overflow-hidden d-block" href="{{ route('cervezas') }}" style="width:33.333%;">
                <img src="./imagenes/banner1.png"       alt="Imagen 2" class="w-100 h-100 object-fit-cover d-none d-md-block">
                <img src="./imagenes/banner1-small.png"  alt="Imagen 2" class="w-100 h-100 object-fit-cover d-md-none">
            </a>
            <a class="h-100 overflow-hidden d-block" href="{{ route('bebidas') }}" style="width:33.333%;">
                <img src="./imagenes/banner2.png"       alt="Imagen 3" class="w-100 h-100 object-fit-cover d-none d-md-block">
                <img src="./imagenes/banner2-small.png"  alt="Imagen 3" class="w-100 h-100 object-fit-cover d-md-none">
            </a>
        </div>

        <button id="prevBtn" class="carousel-btn" aria-label="Anterior">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:24px;height:24px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>
        </button>
        <button id="nextBtn" class="carousel-btn" aria-label="Siguiente">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:24px;height:24px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
            </svg>
        </button>

        <div id="carouselIndicators">
            <div class="indicator active" data-slide="0"><div class="progress-bar"></div></div>
            <div class="indicator"        data-slide="1"><div class="progress-bar"></div></div>
            <div class="indicator"        data-slide="2"><div class="progress-bar"></div></div>
        </div>
    </div>
</section>

{{-- ===== NAVEGADOR DE CATEGORÍAS ===== --}}
<div class="navegador d-none d-md-flex justify-content-center align-items-center mt-3 mb-5 overflow-x-auto"
     id="navegador" style="background-color:var(--bg-primary);">
    <nav>
        <ul class="navegador" style="display:grid;grid-template-columns:repeat(9,1fr);gap:8px;list-style:none;padding:8px;margin:0;">
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="" class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Inicio.png"    alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.home">Inicio</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('cervezas') }}" class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Cervezas.png"  alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.beers">Cervezas</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('licores') }}"  class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Licores.png"   alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.liquors">Licores</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('comidas') }}"  class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Comidas.png"   alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.food">Comidas</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('bebidas') }}"  class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Bebidas.png"   alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.drinks">Bebidas</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('antojos') }}"  class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Antojos.png"   alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.snacks">Antojos</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('helados') }}"  class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Helados.png"   alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.icecream">Helados</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('despensa') }}" class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/Despensa.png"  alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);" data-translate="nav.pantry">Despensa</span>
                </a>
            </li>
            <li class="d-flex flex-column align-items-center text-center small">
                <a href="{{ route('nosotros') }}" class="d-flex flex-column align-items-center text-decoration-none">
                    <img src="./imagenes/Navegador/usuario.png"   alt="" style="height:112px;width:112px;object-fit:contain;">
                    <span class="fw-semibold mt-1" style="color:var(--text-producto);">Integrantes</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

{{-- ===== PRODUCTOS POR CATEGORÍA ===== --}}
<main class="p-3 flex-grow-1" style="background-color:var(--bg-secondary);">
    <div class="container-xl">

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
        <h2 class="fs-4 fw-semibold mb-4" style="color:var(--text-producto);">{{ $titulo }}</h2>
        <section class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 mb-5">

            @foreach($productosPorCategoria[$slug]->take(5) as $producto)
            <div class="col">
                <div class="product-card h-100">
                    <a href="{{ route('producto', $producto->slug) }}" class="d-block">
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                             class="w-100 mx-auto mb-2 object-fit-contain"
                             style="max-height:144px;transition:transform .3s;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                    </a>
                    <a href="{{ route('producto', $producto->slug) }}" class="text-decoration-none flex-grow-1">
                        <p class="mb-0 text-start" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;color:var(--text-primary);">
                            {{ $producto->nombre }}
                        </p>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <span class="fw-bold" style="color:var(--text-primary);">S/ {{ number_format($producto->precio, 2) }}</span>
                        <button class="btn-agregar" aria-label="Añadir"
                                data-producto-id="{{ $producto->id }}">+</button>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Ver más --}}
            <div class="col">
                <div class="product-card h-100 justify-content-center align-items-center">
                    <button class="btn-agregar mb-2" aria-label="ver-mas"
                            onclick="window.location.href='{{ route($slug) }}'">+</button>
                    <span data-translate="categories.seeMore">Ver más</span>
                </div>
            </div>

        </section>
        @endforeach

    </div>
</main>

@endsection
