@extends('layout.plantilla')
@section('title', $titulo . " - D'Ennita")
@section('contenido')

<main class="p-3 flex-grow-1" style="background-color:var(--bg-secondary);">
    <div class="container-xl">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="py-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('inicio') }}"
                       class="text-decoration-none fw-medium"
                       style="color:var(--text-secondary);"
                       data-translate="nav.home">Inicio</a>
                </li>
                <li class="breadcrumb-item active fw-semibold" aria-current="page"
                    style="color:var(--item-migas-activo);">
                    {{ $titulo }}
                </li>
            </ol>
        </nav>

        <h2 class="fs-4 fw-semibold mb-4" style="color:var(--text-producto);">{{ $titulo }}</h2>

        {{-- Grid de productos --}}
        <section class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 mb-5">
            @foreach($productos as $producto)
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
                        <p class="mb-0 text-start"
                           style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;color:var(--text-primary);">
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
        </section>

    </div>
</main>

@endsection
