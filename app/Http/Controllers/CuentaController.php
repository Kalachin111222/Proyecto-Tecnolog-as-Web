<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function webcuenta(){
        return view('cuenta');
    }
}
