<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\UserInventory;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\WalletTransaction;

class GameController extends Controller
{
   
public function game()
{
    $userId = 11; // Usuario temporal

    $plants = Plant::all();

    $items = UserInventory::where('user_id', $userId)
        ->with('item') 
        ->get();

    $wallet = Wallet::where('user_id', $userId)->first();

    return response()->json([
        'plants' => $plants,
        'items'  => $items,
        'wallet' => $wallet
    ]);
}


public function sumar($id, $price)
{
    $userId = 11; // usuario fijo de prueba

    // Obtener el registro de inventario
    $record = UserInventory::where('user_id', $userId)
                           ->where('inventory_item_id', $id)
                           ->first();


    // Incrementar cantidad
    $record->quantity = ($record->quantity ?? 0) + 1;
    $record->save();

    // Obtener wallet
    $wallet = Wallet::where('user_id', $userId)->first();

        // Restar el precio
        $wallet->balance -= $price;
        $wallet->save();

        // Aqui deberia crear una transacción pero no funciona
       WalletTransaction::create([
    'wallet_id' => 11,
    'transaction_types_id' => 2,
    'amount' => $price,
    'event' => 'comprar: Item ID ' . $id
]);

    

    return response()->json([
        'success' => true,
        'quantity' => $record->quantity,
        'wallet_balance' => $wallet ? $wallet->balance : 0
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
