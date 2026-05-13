@extends('layout.plantilla')
@section('title', 'Comida Rapida - D\'Ennita')
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
                                    <span class="text-base font-semibold" style="color: var(--item-migas-activo);" data-translate="nav.food">
                                        Comidas
                                    </span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.food">Comidas</h2>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16 ">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col " style="background-color: var(--bg-card); ">
                    <img src="./imagenes/Productos/Comidas1.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Hamburguesa Prime de Cerdo Miel de Maple 1 und</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 12.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas2.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (3 Empanada De Carne + 3 Empanada De Pollo + 1 Coca Cola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 25.60</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas3.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Sandwich Prime Pulled Pork</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 12.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas4.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Hamburguesa Prime de Res Tocino Queso 1 und</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 12.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas5.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (5 Empanada De Carne + 5 Empanada De Pollo + 1 Coca Cola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 39.20</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas6.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (10 Empanada De Carne)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16 ">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col " style="background-color: var(--bg-card); ">
                    <img src="./imagenes/Productos/Comidas7.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (1 Coca Cola x 1 Lt + 2 Hamburguesa Parrillera)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 21.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas8.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pizza Familiar Premium Selección Chorizos</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 18.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas9.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (10 Empanada De Pollo)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas10.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Cuchareable Alfajor De Manjar Tambo X 150 Gr</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 5.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas11.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (5 Empanada Mixta + 5 Empanada De Pollo)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas12.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (1 Coca Cola x 1 Lt + 2 Hamburguesa Royal Con Queso)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 19.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16 ">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col " style="background-color: var(--bg-card); ">
                    <img src="./imagenes/Productos/Comidas13.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Hamburguesa De Res + 1 Coca Cola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas14.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (1 Coca Cola x 1 Lt + 2 Hamburguesa Doble Con Queso)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 19.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas15.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Hamburguesa Royal Con Queso + 1 Cafe Con Leche Entera Danlac Capuccino Bot 250 Ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 18.70</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas16.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (5 Empanada De Carne + 5 Empanada De Pollo)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas17.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (3 Empanada De Carne + 3 Empanada De Pollo + 1 Inca Kola x 1 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 25.60</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Comidas18.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (4 Empanada De Carne + 2 Empanada Mixta + 4 Empanada De Pollo)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

        </div>

    </main>

@endsection