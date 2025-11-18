<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet; 

class WalletController extends Controller
{
    public function wallet()
    {
        $wallet = Wallet::where('user_id', auth()->id())->first();

        return view('game', compact('wallet'));
    }
}