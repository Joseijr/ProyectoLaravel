<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryItemsController extends Controller
{
   public function index()
    {
        $items = InventoryItem::all();
        return view('index', compact('items'));
    }

    
}
