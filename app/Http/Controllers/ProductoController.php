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

        // Buscamos por nombre, categoría o CÓDIGO DE BARRAS
        $productos = \App\Models\Producto::where('nombre', 'LIKE', "%{$query}%")
                                        ->orWhere('categoria', 'LIKE', "%{$query}%")
                                        ->orWhere('codigo_barras', $query) // <--- ¡Esta es la línea mágica!
                                        ->take(10) // Subimos a 10 por si acaso
                                        ->get();

        return response()->json($productos);
    }
}
