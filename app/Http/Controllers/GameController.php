<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\UserInventory;
use App\Models\Wallet;
use Illuminate\Http\Request;

class GameController extends Controller
{
   
public function game()
{
    $plants = Plant::all(); // Trae todas las plantas
    $items = UserInventory::where('user_id', auth()->id())
        ->with('item') // Cargar info de inventario
        ->get();
    $wallet = Wallet::where('user_id', auth()->id())->first();

    return view('game', compact('plants', 'items', 'wallet'));
}

public function sumar($id)
{
    $userId = 11; // usuario fijo de prueba

    $record = UserInventory::where('user_id', $userId)
                           ->where('inventory_item_id', $id)
                           ->first();

    if (!$record) {
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }

    $record->quantity = ($record->quantity ?? 0) + 1;
    $record->save();

    return response()->json([
        'success' => true,
        'quantity' => $record->quantity
    ]);
}
public function restar($id)
{
    $userId = 11; // usuario fijo de prueba

    $record = UserInventory::where('user_id', $userId)
                           ->where('inventory_item_id', $id)
                           ->first();

    if (!$record) {
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }

    $record->quantity = max(0, ($record->quantity ?? 0) - 1);
    $record->save();

    return response()->json([
        'success' => true,
        'quantity' => $record->quantity
    ]); 

}
}
