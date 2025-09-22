<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\NotaController;
// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'showLogin']);

// Panel (solo si está logueado)
Route::get('/index', [NotaController::class, 'index'])->name('index');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');