<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AntojosController extends Controller
{
    public function webantojos(){
        return view('antojos');
    }
}
