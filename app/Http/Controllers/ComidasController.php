<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComidasController extends Controller
{
    public function webcomidas(){
        return view('comidas');
    }
}
