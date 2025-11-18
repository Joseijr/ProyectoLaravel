<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInventory;
use App\Models\Wallet;
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
            'inventory_item_id' => 9,
            'quantity' => 0,
        ]);
        $userInventory = UserInventory::create([
            'user_id' => $user->id,
            'inventory_item_id' => 10,
            'quantity' => 5,
        ]);
        $userInventory = UserInventory::create([
            'user_id' => $user->id,
            'inventory_item_id' => 8,
            'quantity' => 2,
        ]);
        $userInventory = UserInventory::create([
            'user_id' => $user->id,
            'inventory_item_id' => 2,
            'quantity' => 2,
        ]);
        $wallet = Wallet::create([
            'user_id' => $user->id,
            'balance' => 50,
        ]);

        // Loguear al usuario recién creado
        auth()->login($user);

        // Redirigir al home
        return redirect('/');
    }
}


