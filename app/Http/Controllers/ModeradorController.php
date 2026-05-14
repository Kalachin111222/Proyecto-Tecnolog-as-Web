<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModeradorController extends Controller
{
    private function checkAdmin()
    {
        if (session('rol') !== 'admin') {
            abort(403, 'Acceso denegado.');
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $productos = Producto::orderBy('categoria')->orderBy('nombre')->get();
        return view('moderador', compact('productos'));
    }

    public function store(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'categoria'   => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'imagen'      => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        Producto::create([
            'nombre'      => $request->nombre,
            'categoria'   => $request->categoria,
            'precio'      => $request->precio,
            'imagen'      => $request->imagen,
            'descripcion' => $request->descripcion,
            'slug'        => Str::slug($request->nombre) . '-' . uniqid(),
        ]);

        return back()->with('success', 'Producto agregado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'categoria'   => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'imagen'      => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->only(['nombre','categoria','precio','imagen','descripcion']));

        return back()->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $this->checkAdmin();
        Producto::findOrFail($id)->delete();
        return back()->with('success', 'Producto eliminado correctamente.');
    }
}
