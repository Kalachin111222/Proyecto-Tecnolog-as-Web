@extends('layout.plantilla')
@section('title', 'Panel Cajero — D\'Ennita')

@push('head_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
@endpush

@section('contenido')

{{-- ─── ESTILOS DEL MÓDULO CAJERO ──────────────────────────────── --}}
<style>
    :root {
        --caj-bg:       #f0f2f5;
        --caj-surface:  #ffffff;
        --caj-accent:   #c0392b;       /* rojo D'Ennita */
        --caj-accent2:  #e74c3c;
        --caj-green:    #27ae60;
        --caj-blue:     #2980b9;
        --caj-yape:     #7b2d8b;
        --caj-border:   #dee2e6;
        --caj-text:     #212529;
        --caj-muted:    #6c757d;
    }

    body { background: var(--caj-bg) !important; }

    #cajero-wrap {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 1rem;
        padding: 1rem;
        min-height: calc(100vh - 70px);
    }

    /* ── Panel izquierdo ── */
    .caj-left { display: flex; flex-direction: column; gap: 1rem; }

    .caj-card {
        background: var(--caj-surface);
        border-radius: 12px;
        padding: 1.2rem 1.4rem;
        box-shadow: 0 2px 8px rgba(0,0,0,.07);
    }

    .caj-card h6 {
        font-size: .78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: var(--caj-muted);
        margin-bottom: .8rem;
    }

    /* ── Buscador ── */
    #wrap-buscar { position: relative; }

    #input-buscar {
        width: 100%;
        padding: .65rem 1rem .65rem 2.6rem;
        border: 2px solid var(--caj-border);
        border-radius: 8px;
        font-size: 1rem;
        outline: none;
        transition: border-color .2s;
    }
    #input-buscar:focus { border-color: var(--caj-accent); }

    .buscar-icon {
        position: absolute; left: .85rem; top: 50%;
        transform: translateY(-50%);
        color: var(--caj-muted); font-size: 1rem;
        pointer-events: none;
    }

    #resultados-busqueda {
        position: absolute; top: calc(100% + 4px); left: 0; right: 0;
        background: #fff;
        border: 1px solid var(--caj-border);
        border-radius: 8px;
        box-shadow: 0 8px 24px rgba(0,0,0,.12);
        z-index: 1000;
        max-height: 320px;
        overflow-y: auto;
        display: none;
    }

    .res-item {
        display: flex; align-items: center; gap: .8rem;
        padding: .6rem 1rem;
        cursor: pointer;
        transition: background .15s;
    }
    .res-item:hover, .res-item.hover { background: #f8f9fa; }
    .res-item img { width: 44px; height: 44px; object-fit: cover; border-radius: 6px; }
    .res-item .ri-nombre { font-weight: 600; font-size: .9rem; }
    .res-item .ri-info { font-size: .78rem; color: var(--caj-muted); }
    .res-item .ri-precio { margin-left: auto; font-weight: 700; color: var(--caj-accent); white-space: nowrap; }

    /* ── Tabla de productos ── */
    #tabla-productos { width: 100%; border-collapse: collapse; font-size: .9rem; }
    #tabla-productos thead th {
        border-bottom: 2px solid var(--caj-border);
        padding: .5rem .6rem;
        text-align: left;
        font-size: .76rem;
        text-transform: uppercase;
        color: var(--caj-muted);
        font-weight: 600;
    }
    #tabla-productos tbody tr { border-bottom: 1px solid #f1f1f1; }
    #tabla-productos tbody td { padding: .55rem .6rem; vertical-align: middle; }

    .prod-img-mini { width: 38px; height: 38px; object-fit: cover; border-radius: 6px; }

    .qty-ctrl { display: flex; align-items: center; gap: .3rem; }
    .qty-btn {
        width: 26px; height: 26px;
        border: 1px solid var(--caj-border);
        background: #f8f9fa;
        border-radius: 5px;
        font-size: 1rem; line-height: 1;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        transition: background .15s;
    }
    .qty-btn:hover { background: #e9ecef; }
    .qty-val { width: 34px; text-align: center; font-weight: 600; }

    .btn-quitar {
        background: none; border: none; color: #dc3545;
        font-size: 1.1rem; cursor: pointer; padding: 0 .3rem;
        line-height: 1;
    }

    #fila-vacio td {
        text-align: center; color: var(--caj-muted);
        padding: 2rem 0; font-size: .9rem;
    }

    /* ── Panel derecho: cobro ── */
    .caj-right {
        display: flex; flex-direction: column; gap: 1rem;
        position: sticky; top: 1rem; height: fit-content;
    }

    /* ── Datos cliente ── */
    .caj-field label { font-size: .78rem; font-weight: 600; color: var(--caj-muted); display: block; margin-bottom: .3rem; }
    .caj-field input {
        width: 100%;
        padding: .5rem .8rem;
        border: 1px solid var(--caj-border);
        border-radius: 7px;
        font-size: .9rem;
        outline: none;
        transition: border-color .2s;
    }
    .caj-field input:focus { border-color: var(--caj-accent); }

    /* ── Método de pago ── */
    .metodos { display: grid; grid-template-columns: repeat(3, 1fr); gap: .5rem; }
    .metodo-btn {
        border: 2px solid var(--caj-border);
        background: #fff;
        border-radius: 9px;
        padding: .7rem .4rem;
        text-align: center;
        cursor: pointer;
        transition: all .18s;
        font-size: .8rem;
        font-weight: 600;
        color: var(--caj-muted);
    }
    .metodo-btn .metodo-icon { font-size: 1.5rem; display: block; margin-bottom: .2rem; }
    .metodo-btn:hover { border-color: #aaa; }
    .metodo-btn.activo[data-metodo="efectivo"] { border-color: var(--caj-green); color: var(--caj-green); background: #f0fff4; }
    .metodo-btn.activo[data-metodo="yape"]     { border-color: var(--caj-yape); color: var(--caj-yape); background: #faf0ff; }
    .metodo-btn.activo[data-metodo="tarjeta"]  { border-color: var(--caj-blue); color: var(--caj-blue); background: #f0f7ff; }

    /* ── Monto pagado (efectivo) ── */
    #fila-efectivo { display: none; }
    #vuelto-display {
        font-size: 1.1rem; font-weight: 700;
        color: var(--caj-green);
        text-align: right;
        min-height: 1.5rem;
    }

    /* ── Total ── */
    .total-box {
        background: var(--caj-accent);
        color: #fff;
        border-radius: 10px;
        padding: 1rem 1.2rem;
        display: flex; justify-content: space-between; align-items: center;
    }
    .total-box .tl { font-size: .85rem; opacity: .85; }
    .total-box .tv { font-size: 1.8rem; font-weight: 800; }

    /* ── Botón cobrar ── */
    #btn-cobrar {
        width: 100%;
        padding: .9rem;
        background: var(--caj-accent);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s, transform .1s;
    }
    #btn-cobrar:hover:not(:disabled) { background: var(--caj-accent2); transform: translateY(-1px); }
    #btn-cobrar:disabled { background: #aaa; cursor: not-allowed; transform: none; }

    /* ── Modal boleta ── */
    #modal-boleta-overlay {
        display: none; position: fixed; inset: 0;
        background: rgba(0,0,0,.55);
        z-index: 9000;
        align-items: center; justify-content: center;
    }
    #modal-boleta-overlay.show { display: flex; }

    #modal-boleta {
        background: #fff;
        border-radius: 16px;
        width: 420px;
        max-height: 90vh;
        overflow-y: auto;
        padding: 2rem;
        position: relative;
        box-shadow: 0 20px 60px rgba(0,0,0,.3);
    }

    .boleta-header { text-align: center; border-bottom: 2px dashed #ddd; padding-bottom: 1rem; margin-bottom: 1rem; }
    .boleta-header h4 { font-weight: 800; color: var(--caj-accent); }
    .boleta-table { width: 100%; font-size: .88rem; border-collapse: collapse; }
    .boleta-table td { padding: .35rem .2rem; }
    .boleta-table .tright { text-align: right; }
    .boleta-total-row td { font-weight: 800; font-size: 1rem; border-top: 2px solid #333; padding-top: .5rem; }
    .boleta-vuelto { text-align: center; font-size: 1.2rem; font-weight: 700; color: var(--caj-green); margin: .8rem 0; }

    .btn-boleta-accion {
        display: inline-block;
        padding: .55rem 1.2rem;
        border-radius: 7px;
        font-weight: 600;
        font-size: .9rem;
        cursor: pointer;
        border: none;
        transition: opacity .2s;
    }
    .btn-boleta-accion:hover { opacity: .85; }

    @media (max-width: 768px) {
        #cajero-wrap { grid-template-columns: 1fr; }
        .caj-right { position: static; }
    }
</style>

<div id="cajero-wrap">

    {{-- ══════════════════════════════════════════
         PANEL IZQUIERDO: Búsqueda + Lista items
    ══════════════════════════════════════════ --}}
    <div class="caj-left">

        {{-- Buscador --}}
        <div class="caj-card">
            <h6>🔍 Buscar producto</h6>
            <div id="wrap-buscar">
                <span class="buscar-icon">🔍</span>
                <div class="d-flex gap-2 mb-3">
                    <div id="wrap-buscar" class="flex-grow-1 position-relative">
                        <span class="buscar-icon">🔍</span>
                        <input type="text" id="input-buscar" class="form-control ps-5" placeholder="Buscar nombre o escanear..." autocomplete="off">
                        <div id="resultados-busqueda"></div>
                    </div>
                    <button id="btn-camara" class="btn btn-primary" title="Escanear Código">
                        📷 Escanear
                    </button>
                </div>

                <div id="modal-camara" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); z-index:9999; align-items:center; justify-content:center;">
                    <div style="background:white; padding:20px; border-radius:10px; width:100%; max-width:500px; text-align:center;">
                        <h5 class="mb-3">Acerca el código de barras a la cámara</h5>
                        <div id="lector-qr" style="width: 100%;"></div>
                        <button id="cerrar-camara" class="btn btn-danger mt-3">Cancelar</button>
                    </div>
                </div>
                <div id="resultados-busqueda"></div>
            </div>
        </div>

        {{-- Lista de productos en la venta --}}
        <div class="caj-card" style="flex:1;">
            <h6>🛒 Productos en la venta</h6>
            <table id="tabla-productos">
                <thead>
                    <tr>
                        <th></th>
                        <th>Producto</th>
                        <th>P.Unit.</th>
                        <th>Cantidad</th>
                        <th class="text-end">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody-items">
                    <tr id="fila-vacio">
                        <td colspan="6">
                            <div>Buscá un producto para agregar a la venta</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         PANEL DERECHO: Cliente + Pago + Cobro
    ══════════════════════════════════════════ --}}
    <div class="caj-right">

        {{-- Datos del cliente --}}
        <div class="caj-card">
            <h6>👤 Datos del cliente (opcional)</h6>
            <div class="caj-field mb-2">
                <label>Nombre</label>
                <input type="text" id="cliente-nombre" placeholder="Ej: Juan Pérez">
            </div>
            <div class="caj-field">
                <label>DNI / RUC</label>
                <input type="text" id="cliente-dni" placeholder="Ej: 46123456" maxlength="15">
            </div>
        </div>

        {{-- Método de pago --}}
        <div class="caj-card">
            <h6>💳 Método de pago</h6>
            <div class="metodos">
                <button class="metodo-btn" data-metodo="efectivo">
                    <span class="metodo-icon">💵</span>Efectivo
                </button>
                <button class="metodo-btn" data-metodo="yape">
                    <span class="metodo-icon">📱</span>Yape
                </button>
                <button class="metodo-btn" data-metodo="tarjeta">
                    <span class="metodo-icon">💳</span>Tarjeta
                </button>
            </div>

            {{-- Panel: EFECTIVO --}}
            <div id="panel-efectivo" class="pago-panel" style="display:none;margin-top:.9rem;">
                <div class="caj-field mb-1">
                    <label>Monto recibido (S/)</label>
                    <input type="number" id="monto-pagado" placeholder="0.00" min="0" step="0.10">
                </div>
                <div id="vuelto-display"></div>
            </div>

            {{-- Panel: YAPE --}}
            <div id="panel-yape" class="pago-panel" style="display:none;margin-top:.9rem;">
                <div style="text-align:center;padding:.6rem 0;">
                    <div style="background:#7b2d8b;color:#fff;border-radius:10px;padding:1rem;">
                        <div style="font-size:.78rem;opacity:.8;margin-bottom:.3rem;">Yapear al número</div>
                        <div style="font-size:1.6rem;font-weight:800;letter-spacing:.08em;">944 123 456</div>
                        <div style="font-size:.8rem;opacity:.85;margin-top:.2rem;">D'Ennita Supermercado</div>
                    </div>
                    <div id="yape-monto-display"
                         style="margin-top:.6rem;font-size:1rem;font-weight:700;color:#7b2d8b;"></div>
                    <div style="font-size:.78rem;color:#888;margin-top:.3rem;">
                        Confirmar pago con el cliente antes de cobrar
                    </div>
                </div>
            </div>

            {{-- Panel: TARJETA --}}
            <div id="panel-tarjeta" class="pago-panel" style="display:none;margin-top:.9rem;">
                <div style="background:#ebf3ff;border-radius:10px;padding:.9rem 1rem;border:1px solid #c5d9f1;">
                    <div style="font-size:.78rem;font-weight:700;color:#2980b9;margin-bottom:.6rem;">
                        💳 POS / Terminal de pago
                    </div>
                    <div style="font-size:.85rem;color:#444;line-height:1.6;">
                        1. Ingresa el monto en el POS<br>
                        2. El cliente inserta o acerca su tarjeta<br>
                        3. Confirma el pago y presiona <strong>Cobrar</strong>
                    </div>
                    <div style="margin-top:.7rem;">
                        <label style="font-size:.75rem;font-weight:700;color:#888;display:block;margin-bottom:.3rem;">
                            N° de operación (opcional)
                        </label>
                        <input type="text" id="num-operacion-tarjeta"
                               style="width:100%;padding:.45rem .7rem;border:1px solid #c5d9f1;border-radius:7px;font-size:.88rem;"
                               placeholder="Ej: 00123456">
                    </div>
                    <div id="tarjeta-monto-display"
                         style="margin-top:.5rem;font-size:1rem;font-weight:700;color:#2980b9;text-align:right;"></div>
                </div>
            </div>
        </div>

        {{-- Total --}}
        <div class="total-box">
            <span class="tl">TOTAL</span>
            <span class="tv" id="display-total">S/ 0.00</span>
        </div>

        {{-- Botón cobrar --}}
        <button id="btn-cobrar" disabled>Cobrar</button>

    </div>
</div>


{{-- ══════════════════════════════════════════
     MODAL: Boleta de Venta Presencial
══════════════════════════════════════════ --}}
<div id="modal-boleta-overlay">
    <div id="modal-boleta" id="boleta-contenido">

        <div class="boleta-header">
            <div style="font-size:2rem;">🧾</div>
            <h4>D'Ennita Supermercado</h4>
            <div style="font-size:.82rem;color:#888;">Av. España 123, Trujillo · (044) 123-456</div>
            <div style="margin-top:.6rem;">
                <span style="font-size:.78rem;background:#f1f1f1;padding:.2rem .7rem;border-radius:99px;" id="boleta-codigo"></span>
            </div>
            <div style="font-size:.78rem;color:#888;margin-top:.3rem;" id="boleta-fecha"></div>
        </div>

        {{-- Datos del cliente (si se ingresaron) --}}
        <div id="boleta-datos-cliente" style="font-size:.82rem;margin-bottom:.8rem;color:#555;"></div>

        {{-- Tabla de ítems --}}
        <table class="boleta-table">
            <thead>
                <tr style="border-bottom:1px solid #eee;font-weight:700;font-size:.78rem;color:#888;text-transform:uppercase;">
                    <td>Cant</td>
                    <td>Producto</td>
                    <td class="tright">P.U.</td>
                    <td class="tright">Subtotal</td>
                </tr>
            </thead>
            <tbody id="boleta-tbody"></tbody>
            <tfoot>
                <tr class="boleta-total-row">
                    <td colspan="3">TOTAL</td>
                    <td class="tright" id="boleta-total"></td>
                </tr>
            </tfoot>
        </table>

        {{-- Método pago + Vuelto --}}
        <div style="margin-top:.8rem;padding:.7rem;background:#f8f9fa;border-radius:8px;font-size:.85rem;">
            <div>💳 <strong>Pago:</strong> <span id="boleta-metodo"></span></div>
            <div id="boleta-vuelto-wrap" style="display:none;margin-top:.3rem;">
                💵 <strong>Monto recibido:</strong> <span id="boleta-monto-recibido"></span><br>
                <div class="boleta-vuelto" id="boleta-vuelto"></div>
            </div>
        </div>

        <div style="text-align:center;margin-top:1.2rem;font-size:.75rem;color:#aaa;">
            ¡Gracias por su preferencia!
        </div>

        <div style="display:flex;gap:.6rem;margin-top:1.2rem;justify-content:center;">
            <button class="btn-boleta-accion" onclick="descargarPDF()"
                    style="background:#c0392b;color:#fff;">📥 PDF</button>
            <button class="btn-boleta-accion" onclick="imprimirBoleta()"
                    style="background:#343a40;color:#fff;">🖨 Imprimir</button>
            <button class="btn-boleta-accion" onclick="nuevaVenta()"
                    style="background:var(--caj-accent);color:#fff;">✚ Nueva venta</button>
        </div>

    </div>
</div>

{{-- Plantilla oculta para el PDF --}}
<div id="boleta-pdf-template" style="display:none;">
    <div id="boleta-pdf-contenido" style="width:700px;background:white;color:black;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;padding:30px;">

        {{-- Cabecera --}}
        <div style="display:flex;justify-content:space-between;align-items:flex-start;border-bottom:2px solid #000;padding-bottom:16px;margin-bottom:16px;">
            <div>
                <h1 style="margin:0;font-size:24px;font-weight:bold;">D'Ennita Supermercado</h1>
                <p style="margin:4px 0 0;font-size:13px;">Av. España 123, Trujillo, Perú</p>
                <p style="margin:3px 0 0;font-size:13px;">Teléfono: (044) 123-456</p>
            </div>
            <div style="text-align:center;border:2px solid #000;padding:12px 16px;border-radius:6px;min-width:180px;">
                <p style="margin:0;font-size:13px;font-weight:bold;">R.U.C. 20123456789</p>
                <h2 style="margin:8px 0;font-size:15px;font-weight:bold;background:#eee;padding:4px;">BOLETA ELECTRÓNICA</h2>
                <p style="margin:0;font-size:16px;font-weight:bold;" id="pdf-codigo"></p>
            </div>
        </div>

        {{-- Datos cliente --}}
        <div style="margin-bottom:14px;">
            <table style="width:100%;font-size:13px;">
                <tr>
                    <td style="width:110px;font-weight:bold;padding:3px 0;">Cliente:</td>
                    <td id="pdf-cliente"></td>
                    <td style="width:80px;font-weight:bold;padding:3px 0;text-align:right;">Fecha:</td>
                    <td style="text-align:right;" id="pdf-fecha"></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;padding:3px 0;">DNI / RUC:</td>
                    <td id="pdf-dni"></td>
                    <td style="font-weight:bold;padding:3px 0;text-align:right;">Método:</td>
                    <td style="text-align:right;" id="pdf-metodo"></td>
                </tr>
                <tr id="pdf-fila-operacion" style="display:none;">
                    <td style="font-weight:bold;padding:3px 0;">N° Operación:</td>
                    <td id="pdf-operacion" colspan="3"></td>
                </tr>
            </table>
        </div>

        {{-- Tabla de productos --}}
        <table style="width:100%;border-collapse:collapse;margin-bottom:20px;font-size:13px;">
            <thead>
                <tr style="background:#f8f9fa;">
                    <th style="border:1px solid #000;padding:8px;text-align:center;width:8%;">Cant.</th>
                    <th style="border:1px solid #000;padding:8px;text-align:left;width:52%;">Descripción</th>
                    <th style="border:1px solid #000;padding:8px;text-align:right;width:20%;">P. Unitario</th>
                    <th style="border:1px solid #000;padding:8px;text-align:right;width:20%;">Subtotal</th>
                </tr>
            </thead>
            <tbody id="pdf-tbody"></tbody>
        </table>

        {{-- Totales --}}
        <div style="display:flex;justify-content:flex-end;">
            <table style="width:280px;font-size:14px;">
                <tr id="pdf-fila-recibido" style="display:none;">
                    <td style="padding:6px 8px;border:1px solid #ccc;">Monto recibido:</td>
                    <td style="padding:6px 8px;border:1px solid #ccc;text-align:right;" id="pdf-monto-recibido"></td>
                </tr>
                <tr id="pdf-fila-vuelto" style="display:none;">
                    <td style="padding:6px 8px;border:1px solid #ccc;">Vuelto:</td>
                    <td style="padding:6px 8px;border:1px solid #ccc;text-align:right;" id="pdf-vuelto"></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;padding:8px;text-align:right;border:1px solid #000;">TOTAL A PAGAR:</td>
                    <td style="font-weight:bold;padding:8px;text-align:right;border:1px solid #000;background:#eee;" id="pdf-total"></td>
                </tr>
            </table>
        </div>

        {{-- Footer --}}
        <div style="margin-top:30px;text-align:center;font-size:11px;color:#555;">
            <p style="margin:0;">Representación impresa de la Boleta de Venta Electrónica — Venta presencial.</p>
            <p style="margin:4px 0 0;">Gracias por su preferencia.</p>
        </div>
    </div>
</div>


@push('scripts')
<script>
// ══════════════════════════════════════════════════════════
//  D'Ennita Cajero — lógica completa
// ══════════════════════════════════════════════════════════

const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Estado de la venta actual
let items    = [];           // { id, nombre, precio, imagen, stock, cantidad }
let metodo   = null;

// ── Helpers ──────────────────────────────────────────────

function formatoSoles(n) {
    return 'S/ ' + parseFloat(n).toFixed(2);
}

function ahora() {
    const d = new Date();
    return d.toLocaleDateString('es-PE') + ' ' + d.toLocaleTimeString('es-PE', {hour:'2-digit',minute:'2-digit'});
}

// Resuelve la URL de imagen correctamente según como Laravel guarda la ruta
function getImgSrc(imagen) {
    if (!imagen) return '/img/default.png';
    if (imagen.startsWith('http')) return imagen;
    // Rutas tipo "imagenes/Productos/Cervezas1.webp" → public/imagenes/...
    if (imagen.startsWith('imagenes/')) return '/' + imagen;
    // Rutas subidas por el moderador que van a storage
    return '/storage/' + imagen;
}

// ── Buscador live ─────────────────────────────────────────

const inputBuscar   = document.getElementById('input-buscar');
const dropResultados = document.getElementById('resultados-busqueda');
let timerBuscar;

inputBuscar.addEventListener('input', () => {
    clearTimeout(timerBuscar);
    const q = inputBuscar.value.trim();
    if (q.length < 2) { dropResultados.style.display = 'none'; return; }

    timerBuscar = setTimeout(async () => {
        await buscarProductos(q);
    }, 280);
});

// Soporte lector de código de barras: presionar Enter agrega el primer resultado
inputBuscar.addEventListener('keydown', async (e) => {
    if (e.key === 'Enter') {
        e.preventDefault();
        clearTimeout(timerBuscar);
        const q = inputBuscar.value.trim();
        if (!q) return;
        const resultados = await buscarProductos(q, true); // true = silencioso
        if (resultados && resultados.length > 0) {
            agregarItem(resultados[0]);
        }
    }
    // Navegar dropdown con flechas
    if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
        e.preventDefault();
        const items = dropResultados.querySelectorAll('.res-item');
        if (!items.length) return;
        const activo = dropResultados.querySelector('.res-item.hover');
        let idx = activo ? [...items].indexOf(activo) : -1;
        if (activo) activo.classList.remove('hover');
        idx = e.key === 'ArrowDown' ? Math.min(idx + 1, items.length - 1) : Math.max(idx - 1, 0);
        items[idx].classList.add('hover');
        items[idx].scrollIntoView({ block: 'nearest' });
    }
});

async function buscarProductos(q, silencioso = false) {
    try {
        const res  = await fetch(`{{ route('cajero.buscar') }}?q=${encodeURIComponent(q)}`);
        const data = await res.json();

        if (silencioso) {
            dropResultados.style.display = 'none';
            return data;
        }

        if (!data.length) {
            dropResultados.innerHTML = '<div style="padding:.8rem 1rem;color:#888;font-size:.88rem;">Sin resultados</div>';
        } else {
            dropResultados.innerHTML = data.map(p => `
                <div class="res-item" onclick="agregarItem(${JSON.stringify(p).replace(/"/g,'&quot;')})">
                    <img src="${getImgSrc(p.imagen)}" onerror="this.src='/img/default.png'">
                    <div>
                        <div class="ri-nombre">${p.nombre}</div>
                        <div class="ri-info">${p.categoria} · Stock: ${p.stock}</div>
                    </div>
                    <div class="ri-precio">${formatoSoles(p.precio)}</div>
                </div>
            `).join('');
        }
        dropResultados.style.display = 'block';
        return data;
    } catch(err) {
        console.error('Error buscando producto:', err);
        return [];
    }
}

// Cerrar dropdown al hacer clic fuera
document.addEventListener('click', e => {
    if (!document.getElementById('wrap-buscar').contains(e.target)) {
        dropResultados.style.display = 'none';
    }
});

// ── Manejo de ítems ───────────────────────────────────────

function agregarItem(producto) {
    dropResultados.style.display = 'none';
    inputBuscar.value = '';

    const existe = items.find(i => i.id === producto.id);
    if (existe) {
        if (existe.cantidad < producto.stock) {
            existe.cantidad++;
        } else {
            alert(`Stock máximo alcanzado para "${producto.nombre}"`);
        }
    } else {
        items.push({ ...producto, cantidad: 1 });
    }
    renderTabla();
    actualizarTotal();
}

function cambiarCantidad(id, delta) {
    const item = items.find(i => i.id === id);
    if (!item) return;
    const nueva = item.cantidad + delta;
    if (nueva < 1) return quitarItem(id);
    if (nueva > item.stock) return;
    item.cantidad = nueva;
    renderTabla();
    actualizarTotal();
}

function quitarItem(id) {
    items = items.filter(i => i.id !== id);
    renderTabla();
    actualizarTotal();
}

function renderTabla() {
    const tbody = document.getElementById('tbody-items');
    if (!items.length) {
        tbody.innerHTML = `
            <tr id="fila-vacio">
                <td colspan="6"><div>Buscá un producto para agregar a la venta</div></td>
            </tr>`;
        return;
    }

    tbody.innerHTML = items.map(item => {
        const sub = item.precio * item.cantidad;
        const imgSrc = getImgSrc(item.imagen);
        return `
        <tr>
            <td><img class="prod-img-mini" src="${imgSrc}" onerror="this.src='/img/default.png'"></td>
            <td>
                <div style="font-weight:600;font-size:.88rem;">${item.nombre}</div>
                <div style="font-size:.75rem;color:#888;">${item.categoria}</div>
            </td>
            <td style="font-size:.88rem;">${formatoSoles(item.precio)}</td>
            <td>
                <div class="qty-ctrl">
                    <button class="qty-btn" onclick="cambiarCantidad(${item.id}, -1)">−</button>
                    <span class="qty-val">${item.cantidad}</span>
                    <button class="qty-btn" onclick="cambiarCantidad(${item.id}, +1)">+</button>
                </div>
            </td>
            <td class="text-end" style="font-weight:700;">${formatoSoles(sub)}</td>
            <td>
                <button class="btn-quitar" onclick="quitarItem(${item.id})" title="Quitar">✕</button>
            </td>
        </tr>`;
    }).join('');
}

// ── Total y vuelto ────────────────────────────────────────

function calcularTotal() {
    return items.reduce((acc, i) => acc + i.precio * i.cantidad, 0);
}

function actualizarTotal() {
    const total = calcularTotal();
    document.getElementById('display-total').textContent = formatoSoles(total);
    actualizarVuelto();
    // Actualizar monto en panel activo
    if (metodo === 'yape') {
        document.getElementById('yape-monto-display').textContent =
            total > 0 ? `Monto a yapear: ${formatoSoles(total)}` : '';
    } else if (metodo === 'tarjeta') {
        document.getElementById('tarjeta-monto-display').textContent =
            total > 0 ? `Total a cobrar: ${formatoSoles(total)}` : '';
    }
    validarBotonCobrar();
}

function actualizarVuelto() {
    if (metodo !== 'efectivo') return;
    const total   = calcularTotal();
    const pagado  = parseFloat(document.getElementById('monto-pagado').value) || 0;
    const vuelto  = pagado - total;
    const el      = document.getElementById('vuelto-display');
    if (pagado > 0) {
        el.textContent = vuelto >= 0
            ? `Vuelto: ${formatoSoles(vuelto)}`
            : `⚠ Falta: ${formatoSoles(Math.abs(vuelto))}`;
        el.style.color = vuelto >= 0 ? 'var(--caj-green)' : '#dc3545';
    } else {
        el.textContent = '';
    }
}

document.getElementById('monto-pagado').addEventListener('input', actualizarVuelto);

// ── Método de pago ────────────────────────────────────────

document.querySelectorAll('.metodo-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.metodo-btn').forEach(b => b.classList.remove('activo'));
        btn.classList.add('activo');
        metodo = btn.dataset.metodo;

        // Ocultar todos los paneles
        document.querySelectorAll('.pago-panel').forEach(p => p.style.display = 'none');
        document.getElementById('vuelto-display').textContent = '';
        document.getElementById('monto-pagado').value = '';

        // Mostrar el panel correspondiente
        if (metodo === 'efectivo') {
            document.getElementById('panel-efectivo').style.display = 'block';
        } else if (metodo === 'yape') {
            document.getElementById('panel-yape').style.display = 'block';
            const total = calcularTotal();
            document.getElementById('yape-monto-display').textContent =
                total > 0 ? `Monto a yapear: ${formatoSoles(total)}` : '';
        } else if (metodo === 'tarjeta') {
            document.getElementById('panel-tarjeta').style.display = 'block';
            const total = calcularTotal();
            document.getElementById('tarjeta-monto-display').textContent =
                total > 0 ? `Total a cobrar: ${formatoSoles(total)}` : '';
        }

        validarBotonCobrar();
    });
});

// ── Validación del botón cobrar ───────────────────────────

function validarBotonCobrar() {
    const ok = items.length > 0 && metodo !== null;
    document.getElementById('btn-cobrar').disabled = !ok;
}

// ── Procesar cobro ────────────────────────────────────────

document.getElementById('btn-cobrar').addEventListener('click', async () => {
    const total  = calcularTotal();
    const pagado = parseFloat(document.getElementById('monto-pagado').value) || 0;

    if (metodo === 'efectivo' && pagado < total) {
        alert('El monto recibido es menor al total. Verificá el monto.');
        return;
    }

    const payload = {
        nombre_cliente: document.getElementById('cliente-nombre').value.trim(),
        dni_cliente:    document.getElementById('cliente-dni').value.trim(),
        metodo_pago:    metodo,
        monto_pagado:   metodo === 'efectivo' ? pagado : null,
        items:          items.map(i => ({ id: i.id, cantidad: i.cantidad })),
        _token:         CSRF,
    };

    const btn = document.getElementById('btn-cobrar');
    btn.disabled = true;
    btn.textContent = 'Procesando…';

    try {
        const res  = await fetch('/cajero/venta', {
            method:  'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
            body:    JSON.stringify(payload),
        });
        const data = await res.json();

        if (!res.ok || !data.ok) throw new Error(data.error || 'Error al procesar');

        mostrarBoleta(data, payload);

    } catch (err) {
        alert('❌ ' + err.message);
        btn.disabled = false;
        btn.textContent = 'Cobrar';
    }
});

// ── Mostrar boleta ────────────────────────────────────────

function mostrarBoleta(resp, payload) {
    // Código y fecha
    document.getElementById('boleta-codigo').textContent = resp.codigo_pedido;
    document.getElementById('boleta-fecha').textContent  = ahora();

    // Datos cliente
    const nombreCli = payload.nombre_cliente || 'Cliente General';
    const dniCli    = payload.dni_cliente;
    const dEl       = document.getElementById('boleta-datos-cliente');
    dEl.innerHTML   = `👤 <strong>${nombreCli}</strong>${dniCli ? ' · DNI: ' + dniCli : ''}`;

    // Ítems
    document.getElementById('boleta-tbody').innerHTML = items.map(i => `
        <tr>
            <td>${i.cantidad}</td>
            <td>${i.nombre}</td>
            <td class="tright">${formatoSoles(i.precio)}</td>
            <td class="tright">${formatoSoles(i.precio * i.cantidad)}</td>
        </tr>
    `).join('');

    document.getElementById('boleta-total').textContent = formatoSoles(resp.total);

    // Método pago
    const labels = { efectivo: '💵 Efectivo', yape: '📱 Yape', tarjeta: '💳 Tarjeta' };
    document.getElementById('boleta-metodo').textContent = labels[payload.metodo_pago] || payload.metodo_pago;

    // Vuelto
    const vueltoWrap = document.getElementById('boleta-vuelto-wrap');
    if (payload.metodo_pago === 'efectivo' && resp.vuelto !== null) {
        vueltoWrap.style.display = 'block';
        document.getElementById('boleta-monto-recibido').textContent = formatoSoles(payload.monto_pagado);
        document.getElementById('boleta-vuelto').textContent = `Vuelto: ${formatoSoles(resp.vuelto)}`;
    } else {
        vueltoWrap.style.display = 'none';
    }

    // Mostrar modal
    document.getElementById('modal-boleta-overlay').classList.add('show');
    // Poblar plantilla PDF
    llenarPlantillaPDF(resp, payload);
}

// ── Llenar plantilla PDF ──────────────────────────────────

function llenarPlantillaPDF(resp, payload) {
    const labels = { efectivo: 'Efectivo', yape: 'Yape / Plin', tarjeta: 'Tarjeta' };

    document.getElementById('pdf-codigo').textContent    = resp.codigo_pedido;
    document.getElementById('pdf-fecha').textContent     = ahora();
    document.getElementById('pdf-cliente').textContent   = payload.nombre_cliente || 'Cliente General';
    document.getElementById('pdf-dni').textContent       = payload.dni_cliente    || '—';
    document.getElementById('pdf-metodo').textContent    = labels[payload.metodo_pago] || payload.metodo_pago;
    document.getElementById('pdf-total').textContent     = formatoSoles(resp.total);

    // N° operación tarjeta
    const numOp = document.getElementById('num-operacion-tarjeta').value.trim();
    if (payload.metodo_pago === 'tarjeta' && numOp) {
        document.getElementById('pdf-fila-operacion').style.display = 'table-row';
        document.getElementById('pdf-operacion').textContent = numOp;
    }

    // Efectivo: monto recibido y vuelto
    if (payload.metodo_pago === 'efectivo' && resp.vuelto !== null) {
        document.getElementById('pdf-fila-recibido').style.display = 'table-row';
        document.getElementById('pdf-fila-vuelto').style.display   = 'table-row';
        document.getElementById('pdf-monto-recibido').textContent  = formatoSoles(payload.monto_pagado);
        document.getElementById('pdf-vuelto').textContent          = formatoSoles(resp.vuelto);
    }

    // Ítems
    document.getElementById('pdf-tbody').innerHTML = items.map(i => `
        <tr>
            <td style="border:1px solid #000;padding:7px;text-align:center;">${i.cantidad}</td>
            <td style="border:1px solid #000;padding:7px;">${i.nombre}</td>
            <td style="border:1px solid #000;padding:7px;text-align:right;">${formatoSoles(i.precio)}</td>
            <td style="border:1px solid #000;padding:7px;text-align:right;">${formatoSoles(i.precio * i.cantidad)}</td>
        </tr>
    `).join('');
}

// ── Descargar PDF ─────────────────────────────────────────

// ── Descargar PDF ─────────────────────────────────────────

function descargarPDF() {
    // Obtenemos el código generado automáticamente para el nombre del archivo
    const codigo = document.getElementById('pdf-codigo').textContent || 'boleta';

    // 1. Obtenemos el HTML de la plantilla oculta del cajero
    const contenidoHTML = document.getElementById('boleta-pdf-contenido').innerHTML;

    // 2. Creamos un contenedor temporal en la memoria
    const elementoTemporal = document.createElement('div');
    elementoTemporal.innerHTML = contenidoHTML;

    // 3. Le aplicamos los estilos corregidos para tamaño A4 (Sin usar -9999px)
    elementoTemporal.style.width = '700px';
    elementoTemporal.style.background = 'white';
    elementoTemporal.style.color = 'black';
    elementoTemporal.style.fontFamily = "'Helvetica Neue', Helvetica, Arial, sans-serif";
    elementoTemporal.style.padding = '20px';

    // 4. Configuramos el PDF
    const opciones = {
        margin:       10,
        filename:     `Boleta_DEnnita_${codigo}.pdf`, // Automáticamente usa el código POS-XXXX
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 }, // Mantiene la resolución alta
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // 5. Generamos el PDF desde el contenedor temporal
    html2pdf().set(opciones).from(elementoTemporal).save();
}

// ── Imprimir ──────────────────────────────────────────────

function imprimirBoleta() {
    const contenido = document.getElementById('boleta-pdf-contenido').outerHTML;
    const ventana   = window.open('', '_blank', 'width=800,height:900');
    ventana.document.write(`
        <html><head>
            <title>Boleta D'Ennita</title>
            <style>
                body { margin: 0; padding: 20px; background: white; }
                @media print { body { padding: 0; } }
            </style>
        </head><body>${contenido}</body></html>
    `);
    ventana.document.close();
    ventana.focus();
    setTimeout(() => { ventana.print(); ventana.close(); }, 500);
}

function nuevaVenta() {
    items  = [];
    metodo = null;
    document.querySelectorAll('.metodo-btn').forEach(b => b.classList.remove('activo'));
    document.querySelectorAll('.pago-panel').forEach(p => p.style.display = 'none');
    document.getElementById('cliente-nombre').value   = '';
    document.getElementById('cliente-dni').value      = '';
    document.getElementById('monto-pagado').value     = '';
    document.getElementById('vuelto-display').textContent = '';
    document.getElementById('yape-monto-display').textContent = '';
    document.getElementById('tarjeta-monto-display').textContent = '';
    document.getElementById('num-operacion-tarjeta').value = '';
    renderTabla();
    actualizarTotal();

    document.getElementById('modal-boleta-overlay').classList.remove('show');
    document.getElementById('btn-cobrar').textContent = 'Cobrar';
    document.getElementById('input-buscar').focus();
}

// Cerrar modal al hacer clic en el overlay
document.getElementById('modal-boleta-overlay').addEventListener('click', e => {
    if (e.target === document.getElementById('modal-boleta-overlay')) {
        // No cerramos automáticamente para obligar a confirmar la venta
    }
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    let html5QrcodeScanner;

    const btnCamara = document.getElementById('btn-camara');
    const modalCamara = document.getElementById('modal-camara');
    const btnCerrarCamara = document.getElementById('cerrar-camara');

    // Al hacer clic en "Escanear"
    btnCamara.addEventListener('click', () => {
        modalCamara.style.display = 'flex';

        // Iniciamos el lector
        html5QrcodeScanner = new Html5QrcodeScanner(
            "lector-qr",
            { fps: 10, qrbox: {width: 250, height: 100} }, // Formato rectangular ideal para códigos de barras
            /* verbose= */ false
        );

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    });

    // Cerrar cámara manualmente
    btnCerrarCamara.addEventListener('click', cerrarScanner);

    function cerrarScanner() {
        modalCamara.style.display = 'none';
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear();
        }
    }

    // Cuando detecta un código exitosamente
    function onScanSuccess(decodedText, decodedResult) {
        // Detiene la cámara
        cerrarScanner();

        // Escribe el código en el buscador
        inputBuscar.value = decodedText;

        // Reproduce un pequeño sonido de "Beep" de cajero (opcional)
        let audio = new Audio('https://actions.google.com/sounds/v1/alarms/beep_short.ogg');
        audio.play();

        // Dispara la búsqueda silenciosa que ya teníamos programada
        buscarProductos(decodedText, true).then(resultados => {
            if (resultados && resultados.length > 0) {
                agregarItem(resultados[0]);
                inputBuscar.value = ''; // Limpiamos para el siguiente escaneo
            } else {
                alert('No se encontró ningún producto con el código: ' + decodedText);
            }
        });
    }

    function onScanFailure(error) {
        // Se ejecuta constantemente mientras intenta enfocar un código.
        // No es necesario mostrar alertas aquí.
    }
</script>

@endpush

@endsection
