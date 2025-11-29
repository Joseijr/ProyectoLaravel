<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventoryItemsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\GameController;
use App\Models\InventoryItem;
use App\Models\UserInventory;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1/garden/categories',[InventoryItemsController::class,'allCategories']);
Route::get('/v1/garden/plants',[InventoryItemsController::class,'allItems']);
//Route::get('/v1/garden/inventory',[InventoryItemsController::class,'allItems']);
Route::get('/v1/missions',[MissionsController::class,'allMissions']);

Route::post('/register', [RegisterController::class, 'apiStore']);

Route::post('/login', [LoginController::class, 'apiLogin']);

Route::middleware('auth:sanctum')->get('/user', [LoginController::class, 'getUser']);



Route::get('/v1/game/data', [GameController::class, 'game']);


//Actualizar inventario Sumando una unidad
Route::put('/plants/{id}/{price}/sumar', [GameController::class, 'sumar']);

//Actualizar inventario Restando una unidad
Route::put('/plants/{id}/restar', [GameController::class, 'restar']);
