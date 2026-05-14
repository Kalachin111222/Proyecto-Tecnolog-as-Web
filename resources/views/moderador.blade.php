@extends('layout.plantilla')
@section('title', 'Moderador - D\'Ennita')
@section('contenido')

<main class="p-5 flex-grow" style="background-color: var(--bg-secondary);">
    <div class="max-w-screen-xl mx-auto">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold" style="color: var(--text-primary);">Panel de Moderador</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 rounded-lg font-semibold text-white bg-red-600 hover:bg-red-700 transition">
                    Cerrar sesión
                </button>
            </form>
        </div>

        @if(session('success'))
        <div class="mb-6 p-3 border-l-4 border-green-500 bg-green-50 text-green-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
        @endif

        {{-- Formulario agregar producto --}}
        <div class="rounded-2xl shadow-md p-6 mb-10" style="background-color: var(--bg-card);">
            <h2 class="text-lg font-semibold mb-4" style="color: var(--text-primary);">Agregar nuevo producto</h2>
            <form method="POST" action="{{ route('moderador.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                <input type="text" name="nombre" placeholder="Nombre del producto" required
                    class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">

                <select name="categoria" required
                    class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">
                    <option value="">Selecciona categoría</option>
                    @foreach(['cervezas','licores','comidas','bebidas','antojos','helados','despensa'] as $cat)
                    <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                    @endforeach
                </select>

                <input type="number" name="precio" step="0.01" min="0" placeholder="Precio (S/)" required
                    class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">

                <input type="text" name="imagen" placeholder="Ruta de imagen (ej: imagenes/Productos/foto.png)" required
                    class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">

                <textarea name="descripcion" placeholder="Descripción del producto" rows="2"
                    class="p-3 rounded-xl border-2 focus:outline-none md:col-span-2" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);"></textarea>

                <button type="submit"
                    class="md:col-span-2 py-3 rounded-xl font-bold text-black transition hover:brightness-90"
                    style="background-color: var(--btnAgregar);">
                    Agregar producto
                </button>
            </form>
        </div>

        {{-- Tabla de productos --}}
        <div class="rounded-2xl shadow-md overflow-hidden" style="background-color: var(--bg-card);">
            <table class="w-full text-sm">
                <thead>
                    <tr style="background-color: var(--bg-primary);">
                        <th class="p-3 text-left" style="color: var(--text-secondary);">Imagen</th>
                        <th class="p-3 text-left" style="color: var(--text-secondary);">Nombre</th>
                        <th class="p-3 text-left" style="color: var(--text-secondary);">Categoría</th>
                        <th class="p-3 text-left" style="color: var(--text-secondary);">Precio</th>
                        <th class="p-3 text-center" style="color: var(--text-secondary);">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr class="border-t" style="border-color: var(--border-color);" id="fila-{{ $producto->id }}">
                        <td class="p-3">
                            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-14 h-14 object-contain rounded-lg">
                        </td>
                        <td class="p-3" style="color: var(--text-primary);">{{ $producto->nombre }}</td>
                        <td class="p-3 capitalize" style="color: var(--text-secondary);">{{ $producto->categoria }}</td>
                        <td class="p-3 font-bold" style="color: var(--text-primary);">S/ {{ number_format($producto->precio, 2) }}</td>
                        <td class="p-3 text-center">
                            <div class="flex gap-2 justify-center">
                                {{-- Editar --}}
                                <button onclick="abrirEditar({{ $producto->id }}, '{{ addslashes($producto->nombre) }}', '{{ $producto->categoria }}', {{ $producto->precio }}, '{{ addslashes($producto->imagen) }}', '{{ addslashes($producto->descripcion) }}')"
                                    class="px-3 py-1 rounded-lg text-white bg-blue-500 hover:bg-blue-600 transition text-xs font-semibold">
                                    Editar
                                </button>
                                {{-- Eliminar --}}
                                <form method="POST" action="{{ route('moderador.destroy', $producto->id) }}"
                                    onsubmit="return confirm('¿Eliminar este producto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded-lg text-white bg-red-500 hover:bg-red-600 transition text-xs font-semibold">
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
</main>

{{-- Modal editar --}}
<div id="modal-editar" class="hidden fixed inset-0 z-50 flex items-center justify-center" style="background: rgba(0,0,0,0.6);">
    <div class="rounded-2xl shadow-2xl p-8 w-full max-w-lg relative" style="background-color: var(--bg-card);">
        <button onclick="cerrarEditar()" class="absolute top-4 right-4 text-xl font-bold" style="color: var(--text-primary);">✕</button>
        <h2 class="text-lg font-semibold mb-6" style="color: var(--text-primary);">Editar producto</h2>
        <form id="form-editar" method="POST" class="grid grid-cols-1 gap-4">
            @csrf
            @method('PUT')
            <input type="text" name="nombre" id="edit-nombre" placeholder="Nombre" required
                class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">
            <select name="categoria" id="edit-categoria" required
                class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">
                @foreach(['cervezas','licores','comidas','bebidas','antojos','helados','despensa'] as $cat)
                <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                @endforeach
            </select>
            <input type="number" name="precio" id="edit-precio" step="0.01" min="0" placeholder="Precio" required
                class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">
            <input type="text" name="imagen" id="edit-imagen" placeholder="Ruta imagen" required
                class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);">
            <textarea name="descripcion" id="edit-descripcion" rows="2" placeholder="Descripción"
                class="p-3 rounded-xl border-2 focus:outline-none" style="background: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);"></textarea>
            <button type="submit" class="py-3 rounded-xl font-bold text-black transition hover:brightness-90" style="background-color: var(--btnAgregar);">
                Guardar cambios
            </button>
        </form>
    </div>
</div>

<script>
function abrirEditar(id, nombre, categoria, precio, imagen, descripcion) {
    document.getElementById('form-editar').action = '/moderador/productos/' + id;
    document.getElementById('edit-nombre').value = nombre;
    document.getElementById('edit-categoria').value = categoria;
    document.getElementById('edit-precio').value = precio;
    document.getElementById('edit-imagen').value = imagen;
    document.getElementById('edit-descripcion').value = descripcion;
    document.getElementById('modal-editar').classList.remove('hidden');
}
function cerrarEditar() {
    document.getElementById('modal-editar').classList.add('hidden');
}
document.getElementById('modal-editar').addEventListener('click', function(e) {
    if (e.target === this) cerrarEditar();
});
</script>

@endsection
