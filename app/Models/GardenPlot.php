<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GardenPlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status', // 0=Blocked, 1=Active, 2=Planted
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
