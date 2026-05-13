<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class CervezasController extends Controller
{
    public function webcervezas()
    {
        $productos = Producto::where('categoria', 'cervezas')->get();
        return view('categoria', [
            'productos' => $productos,
            'titulo'    => 'Cervezas',
        ]);
    }
}
