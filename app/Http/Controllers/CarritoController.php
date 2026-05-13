<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function webcarrito(){
        return view('carrito');
    }
}
