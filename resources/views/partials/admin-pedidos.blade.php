<div class="table-responsive bg-white p-4 rounded shadow-sm">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->codigo_pedido }}</td>
                <td>{{ $pedido->user->usuario ?? 'N/A' }}</td>
                <td>S/ {{ number_format($pedido->total, 2) }}</td>
                <td>
                    <form action="{{ route('admin.pedidos.estado', $pedido->id) }}" method="POST" class="d-inline">
                        @csrf @method('PUT')
                        <select name="estado" onchange="this.form.submit()" class="form-select form-select-sm {{ $pedido->estado == 'pagado' ? 'bg-success text-white' : 'bg-warning' }}">
                            <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="pagado" {{ $pedido->estado == 'pagado' ? 'selected' : '' }}>Pagado</option>
                            <option value="preparando" {{ $pedido->estado == 'preparando' ? 'selected' : '' }}>Preparando</option>
                            <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                            <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                            <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="{{ route('boleta', $pedido->codigo_pedido) }}" class="btn btn-sm btn-info">Ver Boleta</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
