<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Middleware\RoleAdmin;

 Route::get('/test', function () {
    return view('test.template');
});


Route::get('/', [MovieController::class, 'index'])->name('movies.index');

// Route::resource('movies', MovieController::class)->parameters(['movies' => 'movie:slug']);





 Route::get('/create-movie', [MovieController::class, 'create'])->name('movies.create')->middleware('auth');
    Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('movies.show');
    Route::get('/movies/{movie:slug}/edit', [MovieController::class, 'edit'])->name('movies.edit')->middleware('auth', RoleAdmin::class);
    Route::put('/movies/{movie:slug}', [MovieController::class, 'update'])->name('movies.update')->middleware('auth', RoleAdmin::class);
    



 Route::get('delete-movie', [MovieController::class, 'destroy'])->name('movies.destroy')->middleware('auth', RoleAdmin::class);

 Route::post('/store-movie', [MovieController::class, 'store'])->name('movies.store')->middleware('auth');


Route::resource('categories',CategoryController::class);


// Route::resource('movies', MovieController::class)
//     ->parameters(['movies' => 'movie:slug']);



// untuk admin
//     Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
//     Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update');

// });









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

