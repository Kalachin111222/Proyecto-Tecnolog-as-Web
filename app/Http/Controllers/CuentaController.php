<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function webcuenta(){
        if (!session('usuario') || session('usuario') === 'invitado') {
            return redirect()->route('login');
        }
        return view('cuenta');
    }
}
