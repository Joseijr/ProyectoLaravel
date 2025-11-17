<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\UserInventory;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // public function game()
    // {
    //     // Traer todas las plantas para mostrarlas en la tienda
    //     $plants = Plant::all();

    //     // Inventario SOLO del usuario logueado, con relación plant incluida
    //    $items = UserInventory::where('user_id', auth()->id())
    // ->with('item')
    // ->get();

    //     return view('game', compact('plants', 'items'));
    // }

   // GameController.php

public function game()
{
    $plants = Plant::all(); // Trae todas las plantas
    $items = UserInventory::where('user_id', auth()->id())
        ->with('item') // Cargar info de inventario
        ->get();

    return view('game', compact('plants', 'items'));
}

}
