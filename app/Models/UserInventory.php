<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInventory extends Model
{
    protected $table = 'user_inventories';

    protected $fillable = [
        'user_id',
        'inventory_item_id',
        'quantity'
    ];

    public function item()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_item_id');
    }
}
