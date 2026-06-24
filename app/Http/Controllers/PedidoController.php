<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\CarritoItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PedidoController extends Controller
{
    // Muestra la vista del formulario de pago
    public function checkout()
    {
        $userId = session('user_id');
        if (!$userId) return redirect()->route('login');

        $carrito = CarritoItem::with('producto')->where('user_id', $userId)->get();
        if ($carrito->isEmpty()) return redirect()->route('carrito');

        $total = $carrito->sum(fn($item) => $item->producto->precio * $item->cantidad);

        return view('checkout', compact('carrito', 'total'));
    }

    // Procesa la compra con los datos del formulario
    public function procesarCompra(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) return response()->json(['error' => 'No autorizado'], 401);

        // Validamos que el cliente haya enviado su dirección y método de pago
        $request->validate([
            'direccion' => 'required|string|max:255',
            'metodo_pago' => 'required|string'
        ]);

        $carritoItems = CarritoItem::with('producto')->where('user_id', $userId)->get();
        if ($carritoItems->isEmpty()) return response()->json(['error' => 'Carrito vacío'], 400);

        try {
            DB::beginTransaction();
            $total = 0;

            foreach ($carritoItems as $item) {
                if ($item->producto->stock < $item->cantidad) {
                    throw new \Exception("Sin stock: " . $item->producto->nombre);
                }
                $total += $item->producto->precio * $item->cantidad;
            }

            $pedido = Pedido::create([
                'user_id' => $userId,
                'codigo_pedido' => 'PED-' . strtoupper(Str::random(6)),
                'total' => $total,
                'estado' => 'pagado',
                'metodo_pago' => $request->metodo_pago, // AHORA ES DINÁMICO
                'direccion_envio' => $request->direccion // AHORA ES DINÁMICO
            ]);

            foreach ($carritoItems as $item) {
                PedidoDetalle::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $item->producto_id,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $item->producto->precio,
                    'subtotal' => $item->producto->precio * $item->cantidad,
                ]);
                $item->producto->decrement('stock', $item->cantidad);
            }

            CarritoItem::where('user_id', $userId)->delete();
            DB::commit();

            // Devolvemos la URL de la boleta para que el JS redireccione
            return response()->json([
                'ok' => true,
                'url_boleta' => route('boleta', $pedido->codigo_pedido)
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // Muestra el recibo/boleta
    public function verBoleta($codigo_pedido)
    {
        // Buscamos el pedido con sus detalles y productos
        $pedido = Pedido::with('detalles.producto')
                        ->where('codigo_pedido', $codigo_pedido)
                        ->where('user_id', session('user_id'))
                        ->firstOrFail();

        return view('boleta', compact('pedido'));
    }

    public function misPedidos()
    {
        $userId = session('user_id');
        if (!$userId) return redirect()->route('login');

        // Traemos los pedidos con sus detalles y productos, ordenados por fecha descendente
        $pedidos = Pedido::with('detalles.producto')
                        ->where('user_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('mis_pedidos', compact('pedidos'));
    }
}
