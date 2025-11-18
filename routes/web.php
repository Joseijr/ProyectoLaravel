<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\InventoryController;


Route::get('/', function () {
	return view('index');
})->name('index.form');



// Login

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/game', [GameController::class, 'game'])->name('game.form');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact.form');


// Sign In (crear usuario)
Route::get('/register', [RegisterController::class, 'create'])->name('user.create');
Route::post('/register', [RegisterController::class, 'store'])->name('user.store');

Route::get('/inventory', [InventoryController::class, 'getUserInventory'])
    ->middleware('auth');

    

Route::post('/inventory/add', [InventoryController::class, 'addItem'])->middleware('auth');
Route::post('/inventory/remove', [InventoryController::class, 'removeItem'])->middleware('auth');







// Route::prefix('courses')->group(function () {

//     // Mostrar formulario
//     Route::get('/create', [CourseController::class, 'create'])->name('courses.create');

//     // Guardar datos
//     Route::post('/store', [CourseController::class, 'store'])->name('courses.store');

// });
