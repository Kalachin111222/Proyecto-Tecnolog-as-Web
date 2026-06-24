@extends('layout.plantilla')
@section('title', 'Boleta de Compra - D\'Ennita')
@section('contenido')
<main class="container py-5 d-flex justify-content-center">

    <div class="card shadow-lg border-0 rounded-4" style="width: 100%; max-width: 500px; background-color: white;">
        <div class="card-header text-center text-white py-3 rounded-top-4" style="background-color: var(--color-header);">
            <h4 class="mb-0 fw-bold">¡Gracias por tu compra!</h4>
        </div>

        <div class="card-body p-4 text-dark">
            <div class="text-center mb-4">
                <h5 class="text-muted mb-1">D'Ennita Supermercado</h5>
                <h2 class="fw-bold mb-0">{{ $pedido->codigo_pedido }}</h2>
                <small class="text-muted">{{ $pedido->created_at->format('d/m/Y h:i A') }}</small>
            </div>

            <hr>

            <div class="mb-3">
                <p class="mb-1"><strong>👤 Cliente:</strong> {{ $pedido->user->usuario ?? 'Cliente' }}</p>
                <p class="mb-1"><strong>📍 Envío:</strong> {{ $pedido->direccion_envio }}</p>
                <p class="mb-1"><strong>💳 Método:</strong> {{ $pedido->metodo_pago }}</p>
                <p class="mb-1"><strong>📦 Estado:</strong> <span class="badge bg-success text-uppercase">{{ $pedido->estado }}</span></p>
            </div>

            <hr>

            <table class="table table-borderless table-sm">
                <thead>
                    <tr class="border-bottom">
                        <th>Cant</th>
                        <th>Producto</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido->detalles as $detalle)
                    <tr>
                        <td>x{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->producto->nombre }}</td>
                        <td class="text-end">S/ {{ number_format($detalle->subtotal, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <div class="d-flex justify-content-between fs-4 fw-bold">
                <span>TOTAL:</span>
                <span>S/ {{ number_format($pedido->total, 2) }}</span>
            </div>
        </div>

        <div class="card-footer bg-light text-center py-3 rounded-bottom-4">
            <button onclick="window.print()" class="btn btn-outline-secondary me-2">🖨️ Imprimir</button>
            <a href="{{ route('inicio') }}" class="btn text-white" style="background-color: var(--color-header);">Volver al inicio</a>
        </div>
    </div>

</main>
@endsection
