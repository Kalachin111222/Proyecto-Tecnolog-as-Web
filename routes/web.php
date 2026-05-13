<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\CervezasController;
use App\Http\Controllers\LicoresController;
use App\Http\Controllers\ComidasController;
use App\Http\Controllers\BebidasController;
use App\Http\Controllers\AntojosController;
use App\Http\Controllers\HeladosController;
use App\Http\Controllers\DespensaController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

Route::get('/', function () {
    $categorias = ['cervezas', 'licores', 'comidas', 'bebidas', 'antojos', 'helados', 'despensa'];

    $productosPorCategoria = collect($categorias)->mapWithKeys(function ($cat) {
        return [$cat => Producto::where('categoria', $cat)->get()];
    });

    return view('welcome', compact('productosPorCategoria'));
})->name('inicio');

Route::get('/login',    [AuthController::class,   'weblogin'])->name('login');
Route::get('/carrito',  [CarritoController::class, 'webcarrito'])->name('carrito');
Route::get('/cuenta',   [CuentaController::class,  'webcuenta'])->name('cuenta');

Route::get('/cervezas', [CervezasController::class, 'webcervezas'])->name('cervezas');
Route::get('/licores',  [LicoresController::class,  'weblicores'])->name('licores');
Route::get('/comidas',  [ComidasController::class,  'webcomidas'])->name('comidas');
Route::get('/bebidas',  [BebidasController::class,  'webbebidas'])->name('bebidas');
Route::get('/antojos',  [AntojosController::class,  'webantojos'])->name('antojos');
Route::get('/helados',  [HeladosController::class,  'webhelados'])->name('helados');
Route::get('/despensa', [DespensaController::class, 'webdespensa'])->name('despensa');

Route::get('/producto/{slug}', [ProductoController::class, 'show'])->name('producto');
