@extends('layout.plantilla')
@section('title', 'Licores - D\'Ennita')
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
                                    <span class="text-base font-semibold" style="color: var(--item-migas-activo);" data-translate="nav.liquors">
                                        Licores
                                    </span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.liquors">Licores</h2>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16 ">
    
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col " style="background-color: var(--bg-card); ">
                    <img src="./imagenes/Productos/Licores1.webp" alt="Pack 2 Cartavio Añejo Black 1L" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack 2 Cartavio Añejo Black 1L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 72.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores2.webp" alt="Pack 2 Ron Black Barrel 1L" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack 2 Ron Black Barrel 1L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 91.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores3.webp" alt="Pack 2 Ron Cartavio Añejo Black 750ml" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack 2 Ron Cartavio Añejo Black 750ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 62.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores4.webp" alt="Pack 2 Vodka Russkaya Apple 750ml" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack 2 Vodka Russkaya Apple 750ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 53.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores5.webp" alt="Ron Cartavio Black 1 L" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Ron Cartavio Black 1 L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 34.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores6.webp" alt="Ron Cartavio Black 750 ml" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Ron Cartavio Black 750 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 29.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16 ">
    
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card); ">
                    <img src="./imagenes/Productos/Licores7.webp" alt="Ron Cartavio Black Barrel 1 L" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Ron Cartavio Black Barrel 1 L</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 43.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores8.webp" alt="Vodka Russkaya Green Apple 750 ml" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Vodka Russkaya Green Apple 750 ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 26.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores9.webp" alt="Pack (2 Ron Captain Morgan 700ml + 1 Coca Cola 1Lt + 1 Hielo 1.5Kg)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Ron Captain Morgan 700ml + 1 Coca Cola 1Lt + 1 Hielo 1.5Kg)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 105.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores10.webp" alt="Pack (1 Ron Captain Morgan 700 Ml + 1 Coca Cola 1 Lt + 1 Hielo 1.5 Kg)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Ron Captain Morgan 700 Ml + 1 Coca Cola 1 Lt + 1 Hielo 1.5 Kg)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 58.10</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores11.webp" alt="Pack (2 Vodka Smirnoff Green Apple 0.7L + 1 Evervess 1.5Lt + 1 Hielo)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Vodka Smirnoff Green Apple 0.7L + 1 Evervess 1.5Lt + 1 Hielo)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 90.70</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores12.webp" alt="Pack (1 Schweppes Ginger Ale x 1.5 Lt + 1 Vodka Smirnoff Green Apple x 700 Ml + Hielo 1.5 Kg)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Schweppes Ginger Ale x 1.5 Lt + 1 Vodka Smirnoff Green Apple x 700 Ml + Hielo 1.5 Kg)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 52.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16 ">
    
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card); ">
                    <img src="./imagenes/Productos/Licores13.webp" alt="Pack (1 Evervess x 1.5 Lt + 1 Vodka Smirnoff Raspberry x 700 Ml + 1 Hielo 1.5 Kg)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Evervess x 1.5 Lt + 1 Vodka Smirnoff Raspberry x 700 Ml + 1 Hielo 1.5 Kg)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 51.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores14.webp" alt="Pack (2 Whisky Johnnie Walker Red Label 750 Ml)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Whisky Johnnie Walker Red Label 750 Ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 127.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores15.webp" alt="Pack (1 Vino Altos del Sur Rose Botella 750ml + 1 Borgoña Botella 750ml)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Vino Altos del Sur Rose Botella 750ml + 1 Borgoña Botella 750ml)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 35.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores16.webp" alt="Pack 2 Vodka Smirnoff Green Apple x 700 Ml" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack 2 Vodka Smirnoff Green Apple x 700 Ml</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 77.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores17.webp" alt="Pack (1 Ron Bacardi Carta Oro x 750 Ml + 1 Hielo 1.5 Kg + 1 Coca Cola Sin Azúcar x 1.5 Lt)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Ron Bacardi Carta Oro x 750 Ml + 1 Hielo 1.5 Kg + 1 Coca Cola Sin Azúcar x 1.5 Lt)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 62.40</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Licores18.webp" alt="Pack (1 Ron Mandatario 6 Años 700 Ml + 1 Coca Cola Sin Azúcar 1.5 Lt + 1 Hielo 1.5 Kg)" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Ron Mandatario 6 Años 700 Ml + 1 Coca Cola Sin Azúcar 1.5 Lt + 1 Hielo 1.5 Kg)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 58.40</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

            </section>
            

        </div>
    </main>

@endsection