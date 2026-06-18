@extends('layout.plantilla')
@section('title', 'Moderador - D\'Ennita')
@section('contenido')

<main class="p-3 flex-grow-1" style="background-color:var(--bg-secondary);">
    <div class="container-xl">

        {{-- Cabecera --}}
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h1 class="fs-4 fw-bold mb-0" style="color:var(--text-primary);">Panel de Moderador</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger fw-semibold">
                    Cerrar sesión
                </button>
            </form>
        </div>

        {{-- Alerta éxito --}}
        @if(session('success'))
        <div class="alert alert-success border-start border-success border-4 rounded-3 small mb-5" role="alert">
            {{ session('success') }}
        </div>
        @endif

        {{-- ===== FORMULARIO AGREGAR PRODUCTO ===== --}}
        <div class="rounded-4 shadow-sm p-4 mb-5" style="background-color:var(--bg-card);">
            <h2 class="fs-6 fw-semibold mb-4" style="color:var(--text-primary);">Agregar nuevo producto</h2>
            <form method="POST" action="{{ route('moderador.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <input type="text" name="nombre" placeholder="Nombre del producto" required
                               class="form-control rounded-3"
                               style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                    </div>
                    <div class="col-12 col-md-6">
                        <select name="categoria" required
                                class="form-select rounded-3"
                                style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                            <option value="">Selecciona categoría</option>
                            @foreach(['cervezas','licores','comidas','bebidas','antojos','helados','despensa'] as $cat)
                            <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" name="precio" step="0.01" min="0" placeholder="Precio (S/)" required
                               class="form-control rounded-3"
                               style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" name="stock" min="0" placeholder="Stock (unidades)" required value="0"
                               class="form-control rounded-3"
                               style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                    </div>
                    <div class="col-12">
                        <input type="text" name="imagen" placeholder="Ruta de imagen (ej: imagenes/Productos/foto.png)" required
                               class="form-control rounded-3"
                               style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                    </div>
                    <div class="col-12">
                        <textarea name="descripcion" placeholder="Descripción del producto" rows="2"
                                  class="form-control rounded-3"
                                  style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit"
                                class="btn w-100 fw-bold text-black rounded-3"
                                style="background-color:var(--btnAgregar);transition:filter .2s;"
                                onmouseover="this.style.filter='brightness(.9)'"
                                onmouseout="this.style.filter='brightness(1)'">
                            Agregar producto
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- ===== TABLA DE PRODUCTOS ===== --}}
        <div class="rounded-4 shadow-sm overflow-hidden" style="background-color:var(--bg-card);">
            <div class="table-responsive">
                <table class="table mb-0 small align-middle">
                    <thead style="background-color:var(--bg-primary);">
                        <tr>
                            <th class="p-3 text-start fw-medium" style="color:var(--text-secondary);">Imagen</th>
                            <th class="p-3 text-start fw-medium" style="color:var(--text-secondary);">Nombre</th>
                            <th class="p-3 text-start fw-medium" style="color:var(--text-secondary);">Categoría</th>
                            <th class="p-3 text-start fw-medium" style="color:var(--text-secondary);">Precio</th>
                            <th class="p-3 text-center fw-medium" style="color:var(--text-secondary);">Stock</th>
                            <th class="p-3 text-center fw-medium" style="color:var(--text-secondary);">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr style="border-top:1px solid var(--border-color);" id="fila-{{ $producto->id }}">
                            <td class="p-3">
                                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                                     class="rounded-2 object-fit-contain"
                                     style="width:56px;height:56px;">
                            </td>
                            <td class="p-3" style="color:var(--text-primary);">{{ $producto->nombre }}</td>
                            <td class="p-3 text-capitalize" style="color:var(--text-secondary);">{{ $producto->categoria }}</td>
                            <td class="p-3 fw-bold" style="color:var(--text-primary);">S/ {{ number_format($producto->precio, 2) }}</td>
                            <td class="p-3 text-center">
                                @if($producto->stock === 0)
                                    <span class="badge rounded-pill text-bg-danger">Sin stock</span>
                                @elseif($producto->stock <= 5)
                                    <span class="badge rounded-pill text-bg-warning">{{ $producto->stock }} uds.</span>
                                @else
                                    <span class="badge rounded-pill text-bg-success">{{ $producto->stock }} uds.</span>
                                @endif
                            </td>
                            <td class="p-3 text-center">
                                <div class="d-flex gap-2 justify-content-center">
                                    <button onclick="abrirEditar({{ $producto->id }}, '{{ addslashes($producto->nombre) }}', '{{ $producto->categoria }}', {{ $producto->precio }}, {{ $producto->stock }}, '{{ addslashes($producto->imagen) }}', '{{ addslashes($producto->descripcion) }}')"
                                            class="btn btn-sm btn-primary fw-semibold">
                                        Editar
                                    </button>
                                    <form method="POST" action="{{ route('moderador.destroy', $producto->id) }}"
                                          onsubmit="return confirm('¿Eliminar este producto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger fw-semibold">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

{{-- ===== MODAL EDITAR (Bootstrap 5) ===== --}}
<div class="modal fade" id="modal-editar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow border-0" style="background-color:var(--bg-card);">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-semibold" id="modalEditarLabel" style="color:var(--text-primary);">Editar producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body pt-3">
                <form id="form-editar" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column gap-3">
                        <input type="text" name="nombre" id="edit-nombre" placeholder="Nombre" required
                               class="form-control rounded-3"
                               style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                        <select name="categoria" id="edit-categoria" required
                                class="form-select rounded-3"
                                style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                            @foreach(['cervezas','licores','comidas','bebidas','antojos','helados','despensa'] as $cat)
                            <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                        <div class="row g-3">
                            <div class="col">
                                <input type="number" name="precio" id="edit-precio" step="0.01" min="0" placeholder="Precio (S/)" required
                                       class="form-control rounded-3"
                                       style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                            </div>
                            <div class="col">
                                <input type="number" name="stock" id="edit-stock" min="0" placeholder="Stock" required
                                       class="form-control rounded-3"
                                       style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                            </div>
                        </div>
                        <input type="text" name="imagen" id="edit-imagen" placeholder="Ruta imagen" required
                               class="form-control rounded-3"
                               style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                        <textarea name="descripcion" id="edit-descripcion" rows="2" placeholder="Descripción"
                                  class="form-control rounded-3"
                                  style="background:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);"></textarea>
                        <button type="submit"
                                class="btn w-100 fw-bold text-black rounded-3"
                                style="background-color:var(--btnAgregar);transition:filter .2s;"
                                onmouseover="this.style.filter='brightness(.9)'"
                                onmouseout="this.style.filter='brightness(1)'">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function abrirEditar(id, nombre, categoria, precio, stock, imagen, descripcion) {
    document.getElementById('form-editar').action = '/moderador/productos/' + id;
    document.getElementById('edit-nombre').value      = nombre;
    document.getElementById('edit-categoria').value   = categoria;
    document.getElementById('edit-precio').value      = precio;
    document.getElementById('edit-stock').value       = stock;
    document.getElementById('edit-imagen').value      = imagen;
    document.getElementById('edit-descripcion').value = descripcion;
    new bootstrap.Modal(document.getElementById('modal-editar')).show();
}
</script>

@endsection
