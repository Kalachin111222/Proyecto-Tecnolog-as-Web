@extends('layout.plantilla')
@section('title', 'Etiquetas de Código de Barras — D\'Ennita')

@section('contenido')

<style>
    .etq-wrap { padding: 1rem; }

    .etq-toolbar {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 1rem;
    }

    #grid-etiquetas {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }

    .etiqueta {
        border: 1px dashed #999;
        border-radius: 8px;
        padding: 10px 8px;
        text-align: center;
        background: #fff;
        page-break-inside: avoid;
    }

    .etiqueta .etq-nombre {
        font-size: .8rem;
        font-weight: 700;
        margin-bottom: 2px;
        min-height: 2.2em;
        overflow: hidden;
    }

    .etiqueta .etq-precio {
        font-size: .95rem;
        font-weight: 800;
        color: #c0392b;
        margin-bottom: 4px;
    }

    .etiqueta svg { max-width: 100%; }

    .etiqueta .etq-codigo {
        font-size: .72rem;
        color: #555;
        letter-spacing: .05em;
    }

    /* Al imprimir, ocultamos todo lo que no sea la cuadrícula de etiquetas.
       Ojo: esto incluye el header y footer del layout general, que por
       defecto SÍ se imprimen porque vienen de plantilla.blade.php y no
       tienen la clase .no-print */
    @media print {
        .no-print,
        header.header-fixed,
        footer,
        .offcanvas { display: none !important; }

        html, body {
            background: #fff !important;
            padding-top: 0 !important;
            margin: 0 !important;
        }

        .etq-wrap { padding: 0 !important; }

        #grid-etiquetas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }

        .etiqueta {
            border: 1px solid #999;
            break-inside: avoid;   /* evita que una etiqueta se corte entre páginas */
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        @page {
            size: A4;
            margin: 10mm;
        }
    }
</style>

<div class="etq-wrap">
    <div class="etq-toolbar no-print">
        <h4 class="mb-0">🏷️ Etiquetas de código de barras ({{ $productos->count() }} productos)</h4>
        <button class="btn btn-primary" onclick="window.print()">🖨️ Imprimir todas</button>
    </div>

    <div id="grid-etiquetas">
        @foreach ($productos as $p)
            <div class="etiqueta">
                <div class="etq-nombre">{{ $p->nombre }}</div>
                <div class="etq-precio">S/ {{ number_format($p->precio, 2) }}</div>
                <svg class="barcode"
                     data-codigo="{{ $p->codigo_barras }}"></svg>
                <div class="etq-codigo">{{ $p->codigo_barras }}</div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"></script>
<script>
    // Dibujamos cada código de barras real a partir del número guardado
    // en la BD. Usamos CODE128 porque acepta cualquier cantidad de dígitos
    // sin exigir un checksum de EAN/UPC, y el lector de la cámara del
    // cajero (html5-qrcode) lo reconoce perfectamente.
    document.querySelectorAll('.barcode').forEach(svg => {
        const codigo = svg.dataset.codigo;
        try {
            JsBarcode(svg, codigo, {
                format: "CODE128",
                width: 1.6,
                height: 45,
                fontSize: 12,
                margin: 4,
                displayValue: false // el número ya lo mostramos aparte
            });
        } catch (e) {
            svg.outerHTML = '<div style="color:#dc3545;font-size:.75rem;">Código inválido</div>';
        }
    });
</script>

@endsection
