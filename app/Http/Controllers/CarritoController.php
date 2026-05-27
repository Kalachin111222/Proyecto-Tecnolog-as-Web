<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoItem;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function webcarrito()
    {
        return view('carrito');
    }

    // GET /carrito/items — devuelve el carrito del usuario autenticado
    public function index()
    {
        $userId = session('user_id');
        if (!$userId) return response()->json([]);

        $items = CarritoItem::with('producto')
            ->where('user_id', $userId)
            ->get()
            ->map(fn($item) => [
                'id'         => $item->id,
                'producto_id'=> $item->producto_id,
                'nombre'     => $item->producto->nombre,
                'precio'     => (float) $item->producto->precio,
                'imagen'     => $item->producto->imagen,
                'cantidad'   => $item->cantidad,
            ]);

        return response()->json($items);
    }

    // POST /carrito/items — agrega o incrementa un producto
    public function store(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) return response()->json(['error' => 'No autenticado'], 401);

        $request->validate(['producto_id' => 'required|exists:productos,id']);

        $item = CarritoItem::firstOrNew([
            'user_id'    => $userId,
            'producto_id'=> $request->producto_id,
        ]);
        $item->cantidad = ($item->cantidad ?? 0) + 1;
        $item->save();

        return response()->json(['ok' => true, 'cantidad' => $item->cantidad]);
    }

    // PUT /carrito/items/{id} — cambia cantidad exacta
    public function update(Request $request, $id)
    {
        $userId = session('user_id');
        if (!$userId) return response()->json(['error' => 'No autenticado'], 401);

        $request->validate(['cantidad' => 'required|integer|min:1']);

        $item = CarritoItem::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $item->update(['cantidad' => $request->cantidad]);

        return response()->json(['ok' => true]);
    }

    // DELETE /carrito/items/{id} — elimina un item
    public function destroy($id)
    {
        $userId = session('user_id');
        if (!$userId) return response()->json(['error' => 'No autenticado'], 401);

        CarritoItem::where('id', $id)->where('user_id', $userId)->delete();

        return response()->json(['ok' => true]);
    }

    // DELETE /carrito/vaciar — vacía todo el carrito
    public function vaciar()
    {
        $userId = session('user_id');
        if (!$userId) return response()->json(['error' => 'No autenticado'], 401);

        CarritoItem::where('user_id', $userId)->delete();

        return response()->json(['ok' => true]);
    }
}
