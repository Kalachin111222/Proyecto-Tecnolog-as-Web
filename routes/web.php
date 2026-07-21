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
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\NosotrosController;
use App\Models\Producto;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CajeroController;

Route::get('/', function () {
    if (!session('usuario')) {
        return redirect()->route('login');
    }
    $categorias = ['cervezas', 'licores', 'comidas', 'bebidas', 'antojos', 'helados', 'despensa'];
    $productosPorCategoria = collect($categorias)->mapWithKeys(function ($cat) {
        return [$cat => Producto::where('categoria', $cat)->get()];
    });
    return view('welcome', compact('productosPorCategoria'));
})->name('inicio');

// Auth
Route::get('/login',  [AuthController::class, 'weblogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/guest',  [AuthController::class, 'guest'])->name('guest');

// Moderador
Route::get('/moderador',             [ModeradorController::class, 'index'])->name('moderador');
Route::post('/moderador/productos',  [ModeradorController::class, 'store'])->name('moderador.store');
Route::put('/moderador/productos/{id}',    [ModeradorController::class, 'update'])->name('moderador.update');
Route::delete('/moderador/productos/{id}', [ModeradorController::class, 'destroy'])->name('moderador.destroy');
// En web.php
Route::get('/admin', [ModeradorController::class, 'index'])->name('admin.panel');

Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');

// Páginas
Route::get('/carrito',  [CarritoController::class, 'webcarrito'])->name('carrito');
Route::get('/carrito/items',         [CarritoController::class, 'index']);
Route::post('/carrito/items',        [CarritoController::class, 'store']);
Route::put('/carrito/items/{id}',    [CarritoController::class, 'update']);
Route::delete('/carrito/items/{id}', [CarritoController::class, 'destroy']);
Route::delete('/carrito/vaciar',     [CarritoController::class, 'vaciar']);
Route::get('/cuenta',   [CuentaController::class,  'webcuenta'])->name('cuenta');

Route::get('/cervezas', [CervezasController::class, 'webcervezas'])->name('cervezas');
Route::get('/licores',  [LicoresController::class,  'weblicores'])->name('licores');
Route::get('/comidas',  [ComidasController::class,  'webcomidas'])->name('comidas');
Route::get('/bebidas',  [BebidasController::class,  'webbebidas'])->name('bebidas');
Route::get('/antojos',  [AntojosController::class,  'webantojos'])->name('antojos');
Route::get('/helados',  [HeladosController::class,  'webhelados'])->name('helados');
Route::get('/despensa', [DespensaController::class, 'webdespensa'])->name('despensa');

Route::get('/producto/{slug}', [ProductoController::class, 'show'])->name('producto');

Route::get('/checkout', [PedidoController::class, 'checkout'])->name('checkout');
Route::post('/procesar-compra', [PedidoController::class, 'procesarCompra'])->name('procesar.compra');
Route::get('/boleta/{codigo_pedido}', [PedidoController::class, 'verBoleta'])->name('boleta');
Route::get('/mis-pedidos', [App\Http\Controllers\PedidoController::class, 'misPedidos'])->name('mis.pedidos');
Route::put('/admin/pedidos/{id}/estado', [App\Http\Controllers\PedidoController::class, 'actualizarEstado'])->name('admin.pedidos.estado');
Route::get('/buscar', [App\Http\Controllers\ProductoController::class, 'buscar'])->name('buscar');

// Ruta para el buscador en tiempo real (AJAX)
Route::get('/api/buscar-en-vivo', [App\Http\Controllers\ProductoController::class, 'buscarEnVivo'])->name('api.buscar');

// Ruta del panel de cajero
Route::get('/cajero', [CajeroController::class, 'index'])->name('cajero.panel');
Route::get('/cajero/etiquetas', [CajeroController::class, 'etiquetas'])->name('cajero.etiquetas');
Route::get('/cajero/buscar', [CajeroController::class, 'buscarProducto'])->name('cajero.buscar');
Route::post('/cajero/venta', [CajeroController::class, 'procesarVenta'])->name('cajero.venta');
Route::post('/cajero/enviar-boleta', [CajeroController::class, 'enviarBoleta'])->name('cajero.enviarBoleta');
Route::get('/cajero/buscar-dni', [CajeroController::class, 'buscarDni'])->name('cajero.buscarDni');
