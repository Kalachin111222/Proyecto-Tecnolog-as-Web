@extends('layout.plantilla')
@section('title', $producto->nombre . ' - D\'Ennita')
@section('contenido')

<main class="p-5 flex-grow flex flex-col" style="background-color: var(--bg-secondary);">
    <div class="max-w-screen-xl mx-auto w-full">

        {{-- Breadcrumb --}}
        <nav class="flex py-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li>
                    <a href="{{ route('inicio') }}" class="text-base font-medium hover:text-yellow-500 transition-colors" style="color: var(--text-secondary);">Inicio</a>
                </li>
                <li>
                    <div class="flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="color: var(--text-secondary);"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                        <a href="{{ route($producto->categoria) }}" class="text-base font-medium hover:text-yellow-500 transition-colors capitalize" style="color: var(--text-secondary);">{{ ucfirst($producto->categoria) }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="color: var(--text-secondary);"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                        <span class="text-base font-semibold" style="color: var(--item-migas-activo);">{{ $producto->nombre }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- Producto principal --}}
        <div class="flex flex-col md:flex-row gap-10 mt-4 rounded-2xl p-6 shadow-md" style="background-color: var(--bg-card);">

            {{-- Imagen --}}
            <div class="flex-1 flex items-center justify-center">
                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                    class="w-full max-w-sm object-contain rounded-xl" style="max-height: 380px;">
            </div>

            {{-- Info --}}
            <div class="flex-1 flex flex-col justify-center gap-4">
                <h1 class="text-2xl font-bold" style="color: var(--text-primary);">{{ $producto->nombre }}</h1>

                <p class="text-3xl font-bold" style="color: var(--text-primary);">S/ {{ number_format($producto->precio, 2) }}</p>

                <p class="text-base leading-relaxed" style="color: var(--text-secondary);">{{ $producto->descripcion }}</p>

                <button
                    onclick="agregarAlCarrito('{{ addslashes($producto->nombre) }}', {{ $producto->precio }})"
                    class="mt-2 px-6 py-3 rounded-full font-bold text-black text-base transition hover:brightness-90 w-fit"
                    style="background-color: var(--btnAgregar);">
                    + Agregar al carrito
                </button>
            </div>
        </div>

        {{-- Podrían interesarte --}}
        @if($relacionados->count() > 0)
        <div class="mt-12">
            <h2 class="text-xl font-semibold mb-6" style="color: var(--text-producto);">Podrían interesarte</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
                @foreach($relacionados as $rel)
                <a href="{{ route('producto', $rel->slug) }}" class="no-underline">
                    <div class="p-4 text-center rounded-2xl shadow-md flex flex-col hover:scale-105 transition-transform cursor-pointer" style="background-color: var(--bg-card);">
                        <img src="{{ asset($rel->imagen) }}" alt="{{ $rel->nombre }}"
                            class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36">
                        <p class="text-sm text-left flex-grow overflow-hidden" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical; color: var(--text-primary);">
                            {{ $rel->nombre }}
                        </p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-base font-bold" style="color: var(--text-primary);">S/ {{ number_format($rel->precio, 2) }}</span>
                            <button onclick="event.preventDefault(); agregarAlCarrito('{{ addslashes($rel->nombre) }}', {{ $rel->precio }})"
                                class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl font-mono"
                                style="background-color: var(--btnAgregar); color: #000;">+</button>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</main>

@endsection
