@extends('layout.plantilla')
@section('title', 'Finalizar Compra - D\'Ennita')
@section('contenido')
<main class="container py-5" style="max-width: 800px;">
    <h2 class="fs-4 fw-bold mb-4" style="color:var(--text-primary);">Finalizar Compra</h2>

    <div class="row g-4">
        {{-- Formulario de Datos --}}
        <div class="col-md-7">
            <div class="card p-4 shadow-sm border-0 rounded-4" style="background-color: var(--bg-card);">
                <form id="form-checkout">
                    @csrf
                    <h5 class="mb-3" style="color:var(--text-primary);">📍 Dirección de Envío</h5>
                    <div class="mb-4">
                        <input type="text" id="direccion" class="form-control" placeholder="Ej: Av. España 123, Trujillo" required>
                    </div>

                    <h5 class="mb-3" style="color:var(--text-primary);">💳 Método de Pago</h5>
                    <select id="metodo_pago" class="form-select mb-4" required>
                        <option value="">Selecciona cómo vas a pagar...</option>
                        <option value="Yape / Plin">Yape / Plin</option>
                        <option value="Tarjeta de Crédito/Débito">Tarjeta (Online)</option>
                        <option value="Efectivo al recibir">Efectivo al recibir</option>
                    </select>

                    <div id="qr-container" class="mt-3 p-3 text-center border rounded d-none" style="background-color: var(--bg-secondary);">
                        <p class="small mb-2">Escanea para pagar con Yape:</p>
                        <img src="{{ asset('imagenes/qr-yape.jpg') }}" alt="QR Yape" style="width: 150px; height: 150px;">
                        <p class="mt-2 fw-bold small">Número: 959 957 132</p>
                    </div>

                    <div id="datos-tarjeta" class="mt-3 p-3 border rounded shadow-sm d-none" style="background-color: var(--bg-secondary);">
                        <h6 class="mb-3 fw-bold" style="color:var(--text-primary);">💳 Datos de la Tarjeta</h6>
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="Número de Tarjeta (ej. 4500 1234 5678 9012)" maxlength="16">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="MM/AA" maxlength="5">
                            </div>
                            <div class="col-6">
                                <input type="password" class="form-control" placeholder="CVV" maxlength="4">
                            </div>
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Titular de la tarjeta">
                        </div>
                        <small class="text-muted mt-2 d-block">Tus datos están encriptados y seguros de forma local.</small>
                    </div>

                    <button type="button" onclick="procesarPago()" class="btn w-100 fw-bold text-white py-2" style="background-color:#16a34a;">
                        Pagar S/ {{ number_format($total, 2) }}
                    </button>
                </form>
            </div>
        </div>

        {{-- Resumen del carrito --}}
        <div class="col-md-5">
            <div class="card p-4 shadow-sm border-0 rounded-4" style="background-color: var(--bg-card);">
                <h5 class="mb-3" style="color:var(--text-primary);">🛒 Resumen</h5>
                <ul class="list-group list-group-flush mb-3">
                    @foreach($carrito as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent" style="color:var(--text-secondary);">
                            {{ $item->producto->nombre }} (x{{ $item->cantidad }})
                            <span class="fw-bold text-dark">S/ {{ number_format($item->producto->precio * $item->cantidad, 2) }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="d-flex justify-content-between fs-5 fw-bold" style="color:var(--text-primary);">
                    <span>Total a pagar:</span>
                    <span>S/ {{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
async function procesarPago() {
    const direccion = document.getElementById('direccion').value;
    const metodo_pago = document.getElementById('metodo_pago').value;

    if(!direccion || !metodo_pago) return alert("Por favor completa tu dirección y método de pago.");

    const csrf = document.querySelector('input[name="_token"]').value;

    try {
        const response = await fetch('/procesar-compra', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
            body: JSON.stringify({ direccion, metodo_pago })
        });
        const data = await response.json();

        if (response.ok) {
            // REDIRIGE AUTOMÁTICAMENTE A LA BOLETA
            window.location.href = data.url_boleta;
        } else {
            alert("Error: " + data.error);
        }
    } catch (e) {
        alert("Ocurrió un error de conexión.");
    }
}
document.getElementById('metodo_pago').addEventListener('change', function() {
    const qr = document.getElementById('qr-container');
    const tarjeta = document.getElementById('datos-tarjeta');

    // Ocultar todo primero
    if(qr) qr.classList.add('d-none');
    if(tarjeta) tarjeta.classList.add('d-none');

    // Mostrar según lo que elija el cliente
    if (this.value === 'Yape / Plin' && qr) {
        qr.classList.remove('d-none');
    } else if (this.value === 'Tarjeta de Crédito/Débito' && tarjeta) {
        tarjeta.classList.remove('d-none');
    }
});
</script>
@endsection
