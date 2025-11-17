<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Mostrar formulario
    public function create()
    {
        return view('register');
    }

    // Guardar usuario
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        // Crear usuario y guardar instancia en $user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $userInventory = UserInventory::create([
            'user_id' => $user->id,
            'inventory_item_id' => 1,
            'quantity' => 2,
        ]);

        // Loguear al usuario recién creado
        auth()->login($user);

        // Redirigir al home
        return redirect('/');
    }
}


