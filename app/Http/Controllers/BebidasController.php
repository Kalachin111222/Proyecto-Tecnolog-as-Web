<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class BebidasController extends Controller
{
    public function webbebidas()
    {
        $productos = Producto::where('categoria', 'bebidas')->get();
        return view('categoria', [
            'productos' => $productos,
            'titulo'    => 'Bebidas',
        ]);
    }
}
