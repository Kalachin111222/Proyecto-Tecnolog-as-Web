@extends('layout.plantilla')
@section('title', 'Resultados de búsqueda - D\'Ennita')
@section('contenido')

<main class="container py-5 flex-grow-1">
    <div class="mb-4">
        <h2 class="fw-bold" style="color:var(--text-primary);">Resultados para: "{{ $query }}"</h2>
        <p class="text-muted">Se encontraron {{ $productos->count() }} producto(s)</p>
    </div>

    @if($productos->count() > 0)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($productos as $producto)
            <div class="col">
                <div class="product-card h-100">
                    <a href="{{ route('producto', $producto->slug) }}" class="text-decoration-none">
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid mb-3 rounded" style="height: 180px; object-fit: contain; width: 100%;">
                        <h6 class="fw-bold text-dark text-truncate">{{ $producto->nombre }}</h6>
                    </a>
                    <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                        <span class="fs-5 fw-bold text-dark">S/ {{ number_format($producto->precio, 2) }}</span>

                        {{-- Formulario para agregar al carrito --}}
                        <form action="/carrito/items" method="POST" class="m-0">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <input type="hidden" name="cantidad" value="1">
                            <button type="submit" class="btn-agregar" title="Agregar al carrito">
                                +
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <h1 style="font-size: 4rem;">🔍</h1>
            <h4 class="mt-3 text-muted">No encontramos productos que coincidan con tu búsqueda.</h4>
            <a href="{{ route('inicio') }}" class="btn btn-primary mt-3">Volver a la tienda</a>
        </div>
    @endif
</main>

@endsection
