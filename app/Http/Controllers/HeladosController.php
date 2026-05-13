<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeladosController extends Controller
{
    public function webhelados(){
        return view('helados');
    }
}
