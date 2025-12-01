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
use App\Http\Controllers\InventoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'user' => $request->user()
    ]);
});
// Catálogo general
Route::get('/v1/garden/categories', [InventoryItemsController::class, 'allCategories']);
Route::get('/v1/garden/plants', [InventoryItemsController::class, 'allPlants']);
Route::get('/v1/garden/items', [InventoryItemsController::class, 'allItems']);
Route::get('/v1/missions',[MissionsController::class,'allMissions']);

Route::post('/register', [RegisterController::class, 'apiStore']);

Route::post('/login', [LoginController::class, 'apiLogin']);


// Route::get('/v1/game/data', [GameController::class, 'game']);


// //Actualizar inventario Sumando una unidad
// Route::put('/plants/{id}/{price}/sumar', [GameController::class, 'sumar']);

// //Actualizar inventario Restando una unidad
// Route::put('/plants/{id}/restar', [GameController::class, 'restar']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/v1/game/data', [GameController::class, 'game']);
    Route::put('/plants/{id}/{price}/sumar', [GameController::class, 'sumar']);
    Route::put('/plants/{id}/restar', [GameController::class, 'restar']);
    Route::put('/plots/buy', [GameController::class, 'buyPlot']);
    Route::get('/v1/garden/inventory', [InventoryController::class, 'getUserInventory']);
    Route::post('/logout', [AuthController::class, 'logout']);

});