<?php

namespace App\Http\Controllers;

use App\Models\Producto;

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
}
