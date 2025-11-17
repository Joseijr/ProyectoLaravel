<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $table = 'inventory_items';

    protected $fillable = [
        'name',
        'inventory_item_category_id',
        'name',
        'price',
    ];

    public function inventories()
    {
        return $this->hasMany(UserInventory::class, 'inventory_item_id');
    }
    // InventoryItem.php
public function plant()
{
    return $this->belongsTo(Plant::class, 'plant_id'); // plant_id debe existir en inventory_items
}

}
