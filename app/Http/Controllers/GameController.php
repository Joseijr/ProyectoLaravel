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

}
