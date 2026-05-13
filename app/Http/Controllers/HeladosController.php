<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HeladosController extends Controller
{
    public function webhelados()
    {
        $productos = Producto::where('categoria', 'helados')->get();
        return view('categoria', [
            'productos' => $productos,
            'titulo'    => 'Helados',
        ]);
    }
}
