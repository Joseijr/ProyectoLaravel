<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItemCategory extends Model
{
   protected $table = 'inventory_item_categories'; 

    protected $fillable = [
        'name'
    ];
}
