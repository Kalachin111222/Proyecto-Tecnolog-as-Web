<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LicoresController extends Controller
{
    public function weblicores(){
        return view('licores');
    }
}
