<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Panel (solo si está logueado)
Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');
