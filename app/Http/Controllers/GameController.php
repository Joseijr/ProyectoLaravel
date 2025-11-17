<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class GameController extends Controller
{

  public function game() // o index(), según tu ruta
    {
        $plants = Plant::all(); // traemos todas las plantas
        return view('game', compact('plants')); // pasamos a la vista
    }
}
