<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class LicoresController extends Controller
{
    public function weblicores()
    {
        $productos = Producto::where('categoria', 'licores')->get();
        return view('categoria', [
            'productos' => $productos,
            'titulo'    => 'Licores',
        ]);
    }
}
