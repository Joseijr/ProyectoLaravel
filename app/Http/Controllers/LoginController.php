<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar formulario de login
    public function create()
    {
        return view('login');
    }

    // Procesar login
    public function store(Request $request)
    {
        // Validar datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Buscar usuario por email
        $user = User::where('email', $request->email)->first();

        // Si no existe → regresar con error
        if (!$user) {
            return back()->withErrors(['email' => 'Email no encontrado']);
        }

        // Verificar contraseña
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Contraseña incorrecta']);
        }

        // Iniciar sesión
        auth()->login($user);

        return redirect('/'); 
    }

    // Cerrar sesión
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
