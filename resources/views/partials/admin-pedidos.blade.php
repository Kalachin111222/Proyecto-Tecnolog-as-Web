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
                    <span class="badge bg-success">{{ ucfirst($pedido->estado) }}</span>
                </td>
                <td>
                    <a href="{{ route('boleta', $pedido->codigo_pedido) }}" class="btn btn-sm btn-info">Ver Boleta</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
