<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
   public function index()
    {
        $plants = Plant::all(); // obtenemos todas las plantas
        return view('index', compact('plants'));
    }
}
