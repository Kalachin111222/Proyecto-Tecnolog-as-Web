<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class AntojosController extends Controller
{
    public function webantojos()
    {
        $productos = Producto::where('categoria', 'antojos')->get();
        return view('categoria', [
            'productos' => $productos,
            'titulo'    => 'Antojos',
        ]);
    }
}
