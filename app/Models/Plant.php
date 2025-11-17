<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Plant extends Model
{
    protected $fillable = [
        'name',
        'growth_hours',
        'water_need_per_day',
        'fertilizer_effect',
        'price',
        'description',
        'image_url'
    ];

    public function inventories()
    {
        return $this->hasMany(UserInventory::class, 'inventory_item_id');
    }
}
