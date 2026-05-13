<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class DespensaController extends Controller
{
    public function webdespensa()
    {
        $productos = Producto::where('categoria', 'despensa')->get();
        return view('categoria', [
            'productos' => $productos,
            'titulo'    => 'Despensa',
        ]);
    }
}
