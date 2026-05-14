<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function weblogin()
    {
        if (session('usuario')) {
            return session('rol') === 'admin'
                ? redirect()->route('moderador')
                : redirect()->route('inicio');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario'  => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('users')->where('usuario', $request->usuario)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['credenciales' => 'Usuario o contraseña incorrectos.']);
        }

        session([
            'usuario' => $user->usuario,
            'rol'     => $user->rol,
            'user_id' => $user->id,
        ]);

        return $user->rol === 'admin'
            ? redirect()->route('moderador')
            : redirect()->route('inicio');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
