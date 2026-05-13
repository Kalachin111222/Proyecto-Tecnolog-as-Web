<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CervezasController extends Controller
{
    public function webcervezas(){
        return view('cervezas');
    }
}
