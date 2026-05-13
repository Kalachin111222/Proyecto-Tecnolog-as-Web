@extends('layout.plantilla')
@section('title', 'Carrito - D\'Ennita')
@section('contenido')

    <main class="carrito-contenedor">
        <h2 data-translate="cartPage.title">Mi Carrito de Compras</h2>
        <div id="carrito-items"></div>
        <div class="carrito-total">
            <h3 id="total-final" data-translate="cartPage.total">Total: S/ 0.00</h3>
        </div>

        <div class="flex flex-wrap items-center justify-between gap-4 carrito-acciones">

            <button 
                onclick="vaciarCarrito()" 
                class="flex-1 w-full px-4 py-2 font-bold text-white whitespace-nowrap transition-colors rounded shadow-md hover:brightness-90 sm:w-auto"
                style="background-color: var(--btn-vaciar-bg, #dc2626);" data-translate="cartPage.emptyCart">
                Vaciar Carrito
            </button>

            <button 
                onclick="window.location.href='{{route('inicio')}}'" 
                class="flex-1 w-full px-4 py-2 font-bold text-white whitespace-nowrap transition-colors rounded shadow-md hover:brightness-90 sm:w-auto"
                style="background-color: var(--btn-continuar-bg, #2563eb);" data-translate="cartPage.continueShopping">
                Continuar Comprando
            </button>

        </div>
        
    </main>


@endsection