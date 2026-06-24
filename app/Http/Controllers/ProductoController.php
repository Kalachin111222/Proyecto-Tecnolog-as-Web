<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function show($slug)
    {
        $producto = Producto::where('slug', $slug)->firstOrFail();

        $relacionados = Producto::where('categoria', $producto->categoria)
            ->where('id', '!=', $producto->id)
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return view('producto', compact('producto', 'relacionados'));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');

        // Buscar productos cuyo nombre o categoría coincidan con el texto
        $productos = \App\Models\Producto::where('nombre', 'LIKE', "%{$query}%")
                                        ->orWhere('categoria', 'LIKE', "%{$query}%")
                                        ->get();

        return view('buscar', compact('productos', 'query'));
    }

    public function buscarEnVivo(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return response()->json([]);
        }

        $productos = \App\Models\Producto::where('nombre', 'LIKE', "%{$query}%")
                                        ->orWhere('categoria', 'LIKE', "%{$query}%")
                                        ->take(5) // Solo mostramos 5 coincidencias rápidas
                                        ->get();

        return response()->json($productos);
    }
}
