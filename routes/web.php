<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlantController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GameController;





// Login

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/game', [GameController::class, 'game'])->name('game.form');

// Sign In (crear usuario)
Route::get('/register', [RegisterController::class, 'create'])->name('user.create');
Route::post('/register', [RegisterController::class, 'store'])->name('user.store');


Route::get('/', [PlantController::class, 'index'])->name('index.form');


Route::prefix('courses')->group(function () {

    // Mostrar formulario
    Route::get('/create', [CourseController::class, 'create'])->name('courses.create');

    // Guardar datos
    Route::post('/store', [CourseController::class, 'store'])->name('courses.store');

});
