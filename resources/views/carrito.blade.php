@extends('layout.plantilla')
@section('title', 'Carrito - D\'Ennita')
@section('contenido')

<main class="container-md my-4 px-3" style="max-width:900px;">
    <h2 class="fs-4 fw-bold mb-4" style="color:var(--text-primary);" data-translate="cartPage.title">
        Mi Carrito de Compras
    </h2>

    <div id="carrito-items"></div>

    <div class="text-end my-4" style="color:var(--text-primary);">
        <h3 class="fs-5 fw-bold" id="total-final" data-translate="cartPage.total">Total: S/ 0.00</h3>
    </div>

    <div class="d-flex flex-wrap gap-3 mt-3">
        <button onclick="vaciarCarrito()"
                class="btn fw-bold text-white flex-fill"
                style="background-color:var(--btn-vaciar-bg);transition:filter .2s;"
                onmouseover="this.style.filter='brightness(.9)'"
                onmouseout="this.style.filter='brightness(1)'"
                data-translate="cartPage.emptyCart">
            Vaciar Carrito
        </button>

        <button onclick="window.location.href='{{ route('inicio') }}'"
                class="btn fw-bold text-white flex-fill"
                style="background-color:var(--btn-continuar-bg);transition:filter .2s;"
                onmouseover="this.style.filter='brightness(.9)'"
                onmouseout="this.style.filter='brightness(1)'"
                data-translate="cartPage.continueShopping">
            Continuar Comprando
        </button>
    </div>
</main>

@endsection
