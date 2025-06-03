<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

 Route::get('/test', function () {
    return view('test.template');
});


Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::resource('movies', MovieController::class)->parameters(['movies' => 'movie:slug']);

Route::resource('categories',CategoryController::class);


Route::resource('movies', MovieController::class)
    ->parameters(['movies' => 'movie:slug'])
    ->middleware('auth')
    ->except(['index', 'show']);


 Route::get('/login', [AuthController::class, 'loginFrom'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


 Route::get('/register', [AuthController::class, 'registerForm'])->name('register');



Route::get('/movies-table', [MovieController::class, 'table'])->name('movies.table');

// Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
// Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

// Route::resource('movies', MovieController::class);

// Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
// // web.php
// Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

