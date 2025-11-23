<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventoryItemsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1/garden/categories',[InventoryItemsController::class,'allCategories']);
Route::get('/v1/garden/plants',[InventoryItemsController::class,'allPlants']);
Route::get('/v1/garden/inventory',[InventoryItemsController::class,'allItems']);

Route::post('/register', [RegisterController::class, 'apiStore']);

Route::post('/login', [LoginController::class, 'apiLogin']);


Route::get('/v1/game/data', [GameController::class, 'game']);