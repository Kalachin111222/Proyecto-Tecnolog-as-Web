@extends('layout.plantilla')
@section('title', 'Mis Pedidos - D\'Ennita')
@section('contenido')

<main class="container py-5 flex-grow-1" style="max-width: 900px;">
    <h2 class="fs-4 fw-bold mb-4" style="color:var(--text-primary);">Mis Pedidos</h2>

    @if($pedidos->isEmpty())
        <div class="text-center p-5 rounded-4 shadow-sm border" style="background-color:var(--bg-card); border-color:var(--border-color)!important;">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 text-muted" style="width:64px;height:64px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <h4 class="fw-semibold" style="color:var(--text-primary);">Aún no tienes pedidos</h4>
            <p style="color:var(--text-secondary);">Explora nuestros productos y realiza tu primera compra.</p>
            <a href="{{ route('inicio') }}" class="btn text-white fw-bold mt-2" style="background-color: var(--color-header);">Ir a comprar</a>
        </div>
    @else
        <div class="d-flex flex-column gap-4">
            @foreach($pedidos as $pedido)
            <div class="card shadow-sm border-0 rounded-4" style="background-color:var(--bg-card);">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center py-3 bg-transparent border-bottom" style="border-color:var(--border-color)!important;">
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--text-primary);">Pedido: {{ $pedido->codigo_pedido }}</h5>
                        <small style="color:var(--text-secondary);">{{ $pedido->created_at->format('d \d\e F, Y - h:i A') }}</small>
                    </div>
                    <div class="text-end mt-2 mt-sm-0">
                        <span class="badge bg-success text-uppercase">{{ $pedido->estado }}</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="mb-2 small" style="color:var(--text-secondary);"><strong>Método de pago:</strong> {{ $pedido->metodo_pago }}</p>
                            <p class="mb-3 small" style="color:var(--text-secondary);"><strong>Dirección de envío:</strong> {{ $pedido->direccion_envio }}</p>

                            <h6 class="fw-semibold small text-uppercase" style="color:var(--text-primary);">Artículos:</h6>
                            <ul class="list-unstyled small" style="color:var(--text-secondary);">
                                @foreach($pedido->detalles as $detalle)
                                    <li>• {{ $detalle->producto->nombre }} (x{{ $detalle->cantidad }})</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-4 d-flex flex-column justify-content-center align-items-md-end border-start-md border-top border-top-md-0 pt-3 pt-md-0 mt-3 mt-md-0" style="border-color:var(--border-color)!important;">
                            <span class="small mb-1" style="color:var(--text-secondary);">Total Pagado:</span>
                            <h4 class="fw-bold mb-3" style="color:var(--text-primary);">S/ {{ number_format($pedido->total, 2) }}</h4>
                            <a href="{{ route('boleta', $pedido->codigo_pedido) }}" class="btn btn-sm btn-outline-primary fw-semibold w-100" style="max-width: 150px;">
                                Ver Boleta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</main>

@endsection
