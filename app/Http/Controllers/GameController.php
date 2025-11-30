<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\UserInventory;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\WalletTransaction;
use App\Models\GardenPlot;

class GameController extends Controller
{
   
public function game(Request $request)
{
    $userId = $request ->user()->id;

    $plants = Plant::all();

    $items = UserInventory::where('user_id', $userId)
        ->with('item') 
        ->get();

    $wallet = Wallet::where('user_id', $userId)->first();
    $plots = GardenPlot::where('user_id', $userId)->get();


    return response()->json([
        'plants' => $plants,
        'items'  => $items,
        'wallet' => $wallet,
        'plots'  => $plots
    ]);
}


public function sumar(Request $request, $id, $price)
    {
        $userId = $request->user()->id;  // ← USUARIO REAL

        $record = UserInventory::where('user_id', $userId)
            ->where('inventory_item_id', $id)
            ->first();

        if (!$record) {
            return response()->json(['error' => 'No existe ese item en inventario'], 404);
        }

        // Incrementar
        $record->quantity++;
        $record->save();

        // Wallet
        $wallet = Wallet::where('user_id', $userId)->first();
        $wallet->balance -= $price;
        $wallet->save();

        // Transacción
        WalletTransaction::create([
            'wallet_id' => $wallet->id,
            'transaction_types_id' => 2,
            'amount' => $price,
            'event' => 'Comprar: Item ID ' . $id
        ]);

        return response()->json([
            'success' => true,
            'quantity' => $record->quantity,
            'wallet_balance' => $wallet->balance
        ]);
    }

public function restar(Request $request, $id)
    {
        $userId = $request->user()->id;  // ← USUARIO REAL

        $record = UserInventory::where('user_id', $userId)
            ->where('inventory_item_id', $id)
            ->first();

        if (!$record) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $record->quantity = max(0, $record->quantity - 1);
        $record->save();

        return response()->json([
            'success' => true,
            'quantity' => $record->quantity
        ]);
    }

//PARCELAS AAAAAAAAAA
public function buyPlot(Request $request)
{
    $request->validate([
        'side'  => 'required|string',
        'index' => 'required|integer',
        'price' => 'required|integer'
    ]);

    $user = $request->user(); // Usuario logueado

    // Obtener wallet
    $wallet = Wallet::where('user_id', $user->id)->first();

    if (!$wallet) {
        return response()->json(['error' => 'No wallet found'], 404);
    }

    // No tiene dinero suficiente
    if ($wallet->balance < $request->price) {
        return response()->json(['error' => 'No enough money'], 400);
    }

    // Descontar dinero
    $wallet->balance -= $request->price;
    $wallet->save();

    $plot = GardenPlot::where('user_id', $user->id)
                      ->where('plot_index', $request->index)
                      ->where('side', $request->side)
                      ->first();

    if (!$plot) {
        return response()->json(['error' => 'Plot not found'], 404);
    }

    // ACTUALIZAR ESTADO
    $plot->status = 1;
    $plot->save();

    // Registrar compra
    WalletTransaction::create([
        'wallet_id' => $wallet->id,
        'transaction_types_id' => 2,
        'amount' => $request->price,
        'event' => 'Buy plot ' . $request->side . ':' . $request->index
    ]);

    return response()->json([
        'success' => true,
        'wallet_balance' => $wallet->balance
    ]);
}

}
