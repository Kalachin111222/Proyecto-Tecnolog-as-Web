@extends('layout.plantilla')
@section('title', 'Helados - D\'Ennita')
@section('contenido')

    <main class="p-5 flex-grow flex flex-col" style="background-color: var(--bg-secondary);">
        <div class="max-w-screen-xl mx-auto w-full">
            <div class="w-full py-6 px-5" style="background-color: var(--bg-secondary);">
                <div class="max-w-screen-xl mx-auto" >
                    <nav class="flex" aria-label="Breadcrumb" style="background-color: var(--bg-secondary);">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="{{route('inicio')}}" class="text-base font-medium transition-colors duration-200 hover:text-yellow-500" style="color: var(--text-secondary);" data-translate="nav.home">
                                    Inicio
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center space-x-1.5">
                                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" style="color: var(--text-secondary);">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                    <span class="text-base font-semibold" style="color: var(--item-migas-activo);" data-translate="nav.icecream">
                                        Helados
                                    </span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.icecreams">Helados</h2>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados1.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado grand Prix Bombones 216 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados2.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Donofrio Peziduri Tricolor Cremoso 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.99</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados3.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Donofrio Peziduri Chocochips Cremoso 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.99</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados4.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Donofrio Peziduri Vainilla Cremoso 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.99</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados5.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Gelático Chocobrownie 450ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 7.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados6.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Gelatico Chocochips 930 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados7.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Gelatico Tricolor 930 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados8.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Gelatico Chocolate 930 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados9.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Donofrio Peziduri Sublime 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 22.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados10.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Donofrio Peziduri Princesa 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 22.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados11.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Donofrio Peziduri Sandwich Vainilla 900 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 22.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados12.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Helado Gelatico Chocochips x 930 Ml + 1 Helado Gelatico Chocolate 4 x 930 Ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 21.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados13.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Helado Gelatico Tricolor x 930 Ml + 1 Helado Gelatico Chocolate 4 x 930 Ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 21.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados14.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Frio Rico Capuccino 130 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 5.79</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados15.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Frio Rico Vainilla 130 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 5.79</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados16.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Frio Rico Vainilla Paleta 93 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 6.20</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados17.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Helado Frío Rico Lúcuma 130 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 5.79</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Helados18.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Helado Gelatico Chocochips x 930 Ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 21.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

        </div>
    </main>


@endsection