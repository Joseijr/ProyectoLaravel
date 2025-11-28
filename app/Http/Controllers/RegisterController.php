<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInventory;
use App\Models\Wallet;
use App\Models\GardenPlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   

    // Guardar usuario
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:25',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        // Crear usuario y guardar instancia en $user
       $user = User::create([
    'name'     => $request->name,
    'email'    => $request->email,
    'password' => Hash::make($request->password),
]);

auth()->login($user);

return redirect('/');
    }

    

  public function apiStore(Request $request)
{
    $request->validate([
        'username' => 'required|max:25',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:8'
    ]);

    $user = User::create([
        'name'     => $request->username,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Plantas
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 1, 'quantity' => 0]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 2, 'quantity' => 2]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 3, 'quantity' => 0]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 4, 'quantity' => 0]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 5, 'quantity' => 0]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 6, 'quantity' => 0]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 7, 'quantity' => 0]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 8, 'quantity' => 2]);

    // Items
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 9, 'quantity' => 0]);
    UserInventory::create(['user_id' => $user->id, 'inventory_item_id' => 10, 'quantity' => 5]);

    // Wallet inicial
    Wallet::create([
        'user_id' => $user->id,
        'balance' => 50,
    ]);

    // Plots iniciales
   for ($i = 0; $i < 8; $i++) {
        GardenPlot::create([
            'user_id' => $user->id,
            'status'  => $i === 0 ? '1' : '0'
        ]);
    }
    return response()->json([
        'success' => true,
        'message' => 'Usuario creado correctamente'
    ]);
}
}

