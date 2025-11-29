<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
     public function allMissions()
    {
        $missions = Mission::all();
      return $missions; 
    }
    
}
