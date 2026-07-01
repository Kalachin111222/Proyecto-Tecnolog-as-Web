<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CajeroController extends Controller
{
    // Panel principal del cajero
    public function index()
    {
        // Solo admin/cajero pueden entrar
        if (!in_array(session('rol'), ['admin', 'cajero'])) {
            return redirect()->route('login');
        }

        return view('cajero');
    }

    // Buscar producto por nombre o código (para el buscador live del cajero)
    public function buscarProducto(Request $request)
    {
        $q = $request->get('q', '');

        if (strlen($q) < 2) {
            return response()->json([]);
        }

        $productos = Producto::where(function($query) use ($q) {
                // Agrupamos la búsqueda para que respete siempre el stock
                $query->where('nombre', 'LIKE', "%{$q}%")
                      ->orWhere('codigo_barras', $q) // <--- ¡AQUÍ ESTÁ LA LÍNEA MÁGICA!
                      ->orWhere('id', $q)
                      ->orWhere('slug', 'LIKE', "%{$q}%");
            })
            ->where('stock', '>', 0)
            ->select('id', 'nombre', 'precio', 'categoria', 'imagen', 'stock')
            ->limit(8)
            ->get();

        return response()->json($productos);
    }

    // Procesar venta presencial desde el cajero
    public function procesarVenta(Request $request)
    {
        if (session('rol') !== 'admin') {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        $request->validate([
            'nombre_cliente'  => 'nullable|string|max:100',
            'dni_cliente'     => 'nullable|string|max:15',
            'metodo_pago'     => 'required|in:efectivo,yape,tarjeta',
            'monto_pagado'    => 'required_if:metodo_pago,efectivo|nullable|numeric|min:0',
            'items'           => 'required|array|min:1',
            'items.*.id'      => 'required|integer|exists:productos,id',
            'items.*.cantidad'=> 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $total = 0;
            $itemsConProducto = [];

            foreach ($request->items as $item) {
                $producto = Producto::lockForUpdate()->findOrFail($item['id']);

                if ($producto->stock < $item['cantidad']) {
                    throw new \Exception("Stock insuficiente: {$producto->nombre} (disponible: {$producto->stock})");
                }

                $subtotal = $producto->precio * $item['cantidad'];
                $total += $subtotal;
                $itemsConProducto[] = compact('producto', 'item', 'subtotal');
            }

            // Nombre del cliente o "Cliente General" si no se ingresó
            $nombreCliente = trim($request->nombre_cliente ?? '');
            $dniCliente    = trim($request->dni_cliente ?? '');
            $notaCliente   = 'VENTA PRESENCIAL';
            if ($nombreCliente) $notaCliente .= " - {$nombreCliente}";
            if ($dniCliente)    $notaCliente .= " (DNI: {$dniCliente})";

            $pedido = Pedido::create([
                'user_id'         => session('user_id'),   // cajero logueado
                'codigo_pedido'   => 'CAJ-' . strtoupper(Str::random(6)),
                'total'           => $total,
                'estado'          => 'completado',
                'metodo_pago'     => $request->metodo_pago,
                'direccion_envio' => $notaCliente,
            ]);

            foreach ($itemsConProducto as $entry) {
                PedidoDetalle::create([
                    'pedido_id'       => $pedido->id,
                    'producto_id'     => $entry['producto']->id,
                    'cantidad'        => $entry['item']['cantidad'],
                    'precio_unitario' => $entry['producto']->precio,
                    'subtotal'        => $entry['subtotal'],
                ]);
                $entry['producto']->decrement('stock', $entry['item']['cantidad']);
            }

            DB::commit();

            // Calcular vuelto si es efectivo
            $vuelto = null;
            if ($request->metodo_pago === 'efectivo' && $request->monto_pagado !== null) {
                $vuelto = round($request->monto_pagado - $total, 2);
            }

            return response()->json([
                'ok'            => true,
                'codigo_pedido' => $pedido->codigo_pedido,
                'total'         => $total,
                'vuelto'        => $vuelto,
                'pedido_id'     => $pedido->id,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
