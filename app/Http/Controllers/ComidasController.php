<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ComidasController extends Controller
{
    public function webcomidas()
    {
        $productos = Producto::where('categoria', 'comidas')->get();
        return view('categoria', [
            'productos' => $productos,
            'titulo'    => 'Comidas',
        ]);
    }
}
