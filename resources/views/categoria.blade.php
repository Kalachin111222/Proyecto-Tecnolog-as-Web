    @extends('layout.plantilla')
@section('title', $titulo . " - D'Ennita")
@section('contenido')
    <main class="p-5 flex-grow flex flex-col" style="background-color: var(--bg-secondary);">
        <div class="max-w-screen-xl mx-auto w-full">

            {{-- Breadcrumb --}}
            <div class="w-full py-6 px-5" style="background-color: var(--bg-secondary);">
                <div class="max-w-screen-xl mx-auto">
                    <nav class="flex" aria-label="Breadcrumb" style="background-color: var(--bg-secondary);">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="{{ route('inicio') }}" class="text-base font-medium transition-colors duration-200 hover:text-yellow-500" style="color: var(--text-secondary);" data-translate="nav.home">
                                    Inicio
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center space-x-1.5">
                                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" style="color: var(--text-secondary);">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                    <span class="text-base font-semibold" style="color: var(--item-migas-activo);">{{ $titulo }}</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);">{{ $titulo }}</h2>

            {{-- Grid de productos --}}
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16">
                @foreach($productos as $producto)
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    {{-- Imagen clickeable --}}
                    <a href="{{ route('producto', $producto->slug) }}" class="block">
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                            class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36 hover:scale-105 transition-transform" />
                    </a>
                    {{-- Nombre clickeable --}}
                    <a href="{{ route('producto', $producto->slug) }}" class="no-underline flex-grow">
                        <p class="text-base overflow-hidden text-left" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">
                            {{ $producto->nombre }}
                        </p>
                    </a>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ {{ number_format($producto->precio, 2) }}</span>
                        <button
                            class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono"
                            aria-label="Añadir"
                            data-producto-id="{{ $producto->id }}"
                            style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                @endforeach
            </section>

        </div>
    </main>
@endsection
