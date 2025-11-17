<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'code',
        'name',
        'category',
        'cycle',
        'modality',
        'quota',
        'description'
    ];
}
