<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem;
use App\Models\InventoryItemCategory;
use App\Models\Plant;

class InventoryItemsController extends Controller
{
   public function allItems()
    {
        $items = InventoryItem::all();
      return $items; 
    }

    public function allCategories()
    {
        $categories = InventoryItemCategory::all();
        return response()->json($categories);   
    }
    public function allPlants()
    {
        $plants = Plant::all();
        return $plants;   
    }

    
}
