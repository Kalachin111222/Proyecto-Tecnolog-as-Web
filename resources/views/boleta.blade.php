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

        <div class="card-footer bg-light text-center py-3 rounded-bottom-4" id="botones-accion">
            <button onclick="descargarPDF()" class="btn btn-danger me-2">📥 PDF</button>
            <a href="{{ route('inicio') }}" class="btn text-white" style="background-color: var(--color-header);">Volver al inicio</a>
        </div>
    </div>

</main>

{{-- PLANTILLA FORMAL PARA EL PDF (Oculta en la web) --}}
<div id="boleta-formal" style="display: none; width: 800px; background: white; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; padding: 40px;">

    {{-- Cabecera del Documento --}}
    <div style="display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 2px solid #000; padding-bottom: 20px; margin-bottom: 20px;">
        <div>
            <h1 style="margin: 0; font-size: 28px; font-weight: bold;">D'Ennita Supermercado</h1>
            <p style="margin: 5px 0 0; font-size: 14px;">Av. España 123, Trujillo, Perú</p>
            <p style="margin: 5px 0 0; font-size: 14px;">Teléfono: (044) 123-456</p>
            <p style="margin: 5px 0 0; font-size: 14px;">contacto@ennita.pe</p>
        </div>
        <div style="text-align: center; border: 2px solid #000; padding: 15px; border-radius: 8px; min-width: 200px;">
            <p style="margin: 0; font-size: 16px; font-weight: bold;">R.U.C. 20123456789</p>
            <h2 style="margin: 10px 0; font-size: 18px; font-weight: bold; background-color: #eee; padding: 5px;">BOLETA ELECTRÓNICA</h2>
            <p style="margin: 0; font-size: 18px; font-weight: bold;">{{ $pedido->codigo_pedido }}</p>
        </div>
    </div>

    {{-- Datos del Cliente --}}
    <div style="margin-bottom: 20px;">
        <table style="width: 100%; font-size: 14px;">
            <tr>
                <td style="width: 120px; font-weight: bold; padding: 4px 0;">Cliente:</td>
                <td>{{ $pedido->user->usuario ?? 'Cliente General' }}</td>
                <td style="width: 120px; font-weight: bold; padding: 4px 0; text-align: right;">Fecha:</td>
                <td style="text-align: right;">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; padding: 4px 0;">Dirección:</td>
                <td>{{ $pedido->direccion_envio }}</td>
                <td style="font-weight: bold; padding: 4px 0; text-align: right;">Método:</td>
                <td style="text-align: right;">{{ $pedido->metodo_pago }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; padding: 4px 0;">Estado:</td>
                <td style="text-transform: uppercase;">{{ $pedido->estado }}</td>
                <td colspan="2"></td>
            </tr>
        </table>
    </div>

    {{-- Tabla de Productos --}}
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px; font-size: 14px;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th style="border: 1px solid #000; padding: 10px; text-align: center; width: 10%;">Cant.</th>
                <th style="border: 1px solid #000; padding: 10px; text-align: left; width: 50%;">Descripción del Producto</th>
                <th style="border: 1px solid #000; padding: 10px; text-align: right; width: 20%;">P. Unitario</th>
                <th style="border: 1px solid #000; padding: 10px; text-align: right; width: 20%;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->detalles as $detalle)
            <tr>
                <td style="border: 1px solid #000; padding: 10px; text-align: center;">{{ $detalle->cantidad }}</td>
                <td style="border: 1px solid #000; padding: 10px;">{{ $detalle->producto->nombre }}</td>
                <td style="border: 1px solid #000; padding: 10px; text-align: right;">S/ {{ number_format($detalle->precio_unitario, 2) }}</td>
                <td style="border: 1px solid #000; padding: 10px; text-align: right;">S/ {{ number_format($detalle->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Totales --}}
    <div style="display: flex; justify-content: flex-end;">
        <table style="width: 300px; font-size: 16px;">
            <tr>
                <td style="font-weight: bold; padding: 10px; text-align: right; border: 1px solid #000;">TOTAL A PAGAR:</td>
                <td style="font-weight: bold; padding: 10px; text-align: right; border: 1px solid #000; background-color: #eee;">
                    S/ {{ number_format($pedido->total, 2) }}
                </td>
            </tr>
        </table>
    </div>

    {{-- Footer --}}
    <div style="margin-top: 40px; text-align: center; font-size: 12px; color: #555;">
        <p>Representación impresa de la Boleta de Venta Electrónica.</p>
        <p>Gracias por su preferencia.</p>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
function descargarPDF() {
    // 1. Obtenemos el HTML de la plantilla
    const contenidoHTML = document.getElementById('boleta-formal').innerHTML;

    // 2. Creamos un contenedor temporal en la memoria
    const elementoTemporal = document.createElement('div');
    elementoTemporal.innerHTML = contenidoHTML;

    // 3. Le aplicamos los estilos corregidos para tamaño A4
    // CAMBIO CLAVE: Reducimos el ancho a 700px y el padding para que encaje perfecto
    elementoTemporal.style.width = '700px';
    elementoTemporal.style.background = 'white';
    elementoTemporal.style.color = 'black';
    elementoTemporal.style.fontFamily = "'Helvetica Neue', Helvetica, Arial, sans-serif";
    elementoTemporal.style.padding = '20px';

    // 4. Configuramos el PDF
    const opciones = {
        margin:       10,
        filename:     'Boleta_DEnnita_{{ $pedido->codigo_pedido }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 }, // Mantiene la resolución alta
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // 5. Generamos el PDF desde el contenedor temporal
    html2pdf().set(opciones).from(elementoTemporal).save();
}
</script>

@endsection
