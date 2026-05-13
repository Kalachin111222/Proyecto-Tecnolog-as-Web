<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DespensaController extends Controller
{
    public function webdespensa(){
        return view('despensa');
    }
}
