@extends('layout.plantilla')

@section('contenido')

    <main class="p-5 flex-grow flex flex-col" style="background-color: var(--bg-secondary);">

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
                                <span class="text-base font-semibold" style="color: var(--item-migas-activo);" data-translate="nav.snacks">
                                    Antojos
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="max-w-screen-xl mx-auto w-full">

            <h2 class="text-2xl mb-8 font-semibold" style="color: var(--text-producto);" data-translate="categories.snacks">Antojos</h2>
            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16 ">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col " style="background-color: var(--bg-card); ">
                    <img src="./imagenes/Productos/Antojos1.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Inka Chips Jalapeño x 135 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 17.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos2.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Inka Chips Queso Y Cebolla x 135 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 17.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos3.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 1 (Keke Pinguino Marinela Cookies Cream 80gr + Keke Pinguino Marinela Triple Chocolate 80gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 8.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos4.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack 2 (Papas Kona Select Original 100 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos5.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Papas Jappy Snacks BBQ 200 gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos6.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" style="color: var(--text-primary);">Pack (2 Papas Jappy Snacks Jalapeño 200 gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 15.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos7.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Papas Jappy Snacks BBQ 200 gr</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 7.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos8.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Papas Pringles Original x 104 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 21.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos9.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Papas Pringles Queso x 109 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 21.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos10.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Papas Pringles Sour&Cream Onion x 109 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 21.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos11.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (1 Chocolate Reeses Barra 47Gr + 1 Chocolate Reeses Peanut Butter Cup 42 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 10.20</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos12.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Tostones Inka Chips Jalapeño 95 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 16.98</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-16">
                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos13.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack 1 (Keke Pinguino Marinela 80gr + Keke Pinguino Marinela Cookies Cream 80gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 8.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos14.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack 1 (Keke Pinguino Marinela 80gr + Keke Pinguino Marinela Triple Chocolate 80gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 8.00</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos15.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Pack (2 Inka Chips Artesanal x 135 Gr)</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 17.80</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos16.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Chifles Crickets salados 150 gr</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 9.09</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos17.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Chifles Crickets Leche de Tigre 150 gr</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 9.09</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>

                <div class="p-4 text-center rounded-2xl shadow-md flex flex-col" style="background-color: var(--bg-card);">
                    <img src="./imagenes/Productos/Antojos18.webp" alt="" class="w-full max-w-xs h-auto mx-auto mb-2 object-contain max-h-36" />
                    <p class="text-base overflow-hidden text-left flex-grow" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; color: var(--text-primary);">Chocolate MR. Beast Feastables mix chocolate 35 gr</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-base font-bold" style="color: var(--text-primary);">S/ 11.90</span>
                        <button class="rounded-full w-9 h-9 flex items-center justify-center border-none cursor-pointer text-2xl leading-none font-mono" aria-label="Añadir" style="background-color: var(--btnAgregar); color: #000000;">+</button>
                    </div>
                </div>
            </section>


        </div>
    </main>

@endsection