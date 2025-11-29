<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
   protected $fillable = [
    'wallet_id',
    'transaction_types_id',
    'amount',
    'event'
];


}
