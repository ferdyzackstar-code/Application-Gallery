<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeFotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FotoController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/album', [AlbumController::class, 'store'])->name('album.store');
    Route::get('/foto/create', [AlbumController::class, 'create'])->name('foto.create');
    Route::post('/foto', [AlbumController::class, 'store'])->name('foto.store');
    Route::post('/likefoto/{id}/like', [LikeFotoController::class, 'like'])->name('foto.like');
});

Route::resource('foto', FotoController::class);
Route::resource('album', AlbumController::class);