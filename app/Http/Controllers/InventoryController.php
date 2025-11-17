<?php

namespace App\Http\Controllers;

use App\Models\UserInventory;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function getUserInventory()
    {
        $userId = Auth::id();

        $inventory = UserInventory::where('user_id', $userId)
            ->with(['item.category'])
            ->get();

        return response()->json($inventory);
    }
}
