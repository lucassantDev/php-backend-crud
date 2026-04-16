<?php

use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('administrador', AdministradoresController::class);



