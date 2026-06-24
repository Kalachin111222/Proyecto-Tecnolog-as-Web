@extends('layout.plantilla')
@section('title', $producto->nombre . ' - D\'Ennita')
@section('contenido')

<main class="p-3 flex-grow-1" style="background-color:var(--bg-secondary);">
    <div class="container-xl">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="py-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('inicio') }}"
                       class="text-decoration-none fw-medium"
                       style="color:var(--text-secondary);">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route($producto->categoria) }}"
                       class="text-decoration-none fw-medium text-capitalize"
                       style="color:var(--text-secondary);">{{ ucfirst($producto->categoria) }}</a>
                </li>
                <li class="breadcrumb-item active fw-semibold" aria-current="page"
                    style="color:var(--item-migas-activo);">
                    {{ $producto->nombre }}
                </li>
            </ol>
        </nav>

        {{-- Producto principal --}}
        <div class="row g-5 mt-1 rounded-4 p-4 shadow-sm" style="background-color:var(--bg-card);">

            {{-- Imagen --}}
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                     class="img-fluid rounded-3 object-fit-contain"
                     style="max-height:380px;">
            </div>

            {{-- Info --}}
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center gap-3">
                <h1 class="fs-4 fw-bold mb-0" style="color:var(--text-primary);">{{ $producto->nombre }}</h1>

                <p class="fs-3 fw-bold mb-0" style="color:var(--text-primary);">S/ {{ number_format($producto->precio, 2) }}</p>

                <p class="lh-base mb-0" style="color:var(--text-secondary);">{{ $producto->descripcion }}</p>

                <button data-producto-id="{{ $producto->id }}"
                onclick="agregarAlCarrito('{{ addslashes($producto->nombre) }}', {{ $producto->precio }}, {{ $producto->id }}, '{{ asset($producto->imagen) }}')"
                class="btn rounded-pill fw-bold text-black px-4 py-2 align-self-start"
                        style="background-color:var(--btnAgregar);transition:filter .2s;"
                        onmouseover="this.style.filter='brightness(.9)'"
                        onmouseout="this.style.filter='brightness(1)'">
                    + Agregar al carrito
                </button>
            </div>
        </div>

        {{-- Relacionados --}}
        @if($relacionados->count() > 0)
        <div class="mt-5">
            <h2 class="fs-5 fw-semibold mb-4" style="color:var(--text-producto);">Podrían interesarte</h2>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
                @foreach($relacionados as $rel)
                <div class="col">
                    <a href="{{ route('producto', $rel->slug) }}" class="text-decoration-none">
                        <div class="product-card h-100"
                             style="transition:transform .3s;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                            <img src="{{ asset($rel->imagen) }}" alt="{{ $rel->nombre }}"
                                 class="w-100 mx-auto mb-2 object-fit-contain"
                                 style="max-height:144px;">
                            <p class="small text-start flex-grow-1 mb-0"
                               style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;color:var(--text-primary);">
                                {{ $rel->nombre }}
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="fw-bold small" style="color:var(--text-primary);">S/ {{ number_format($rel->precio, 2) }}</span>
                                <button onclick="event.preventDefault(); agregarAlCarrito('{{ addslashes($rel->nombre) }}', {{ $rel->precio }}, {{ $rel->id }})"
                                        data-producto-id="{{ $rel->id }}"
                                        class="btn-agregar">+</button>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</main>

@endsection
