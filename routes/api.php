<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Регистрация пользователя
Route::post('/register', [AuthController::class, 'register']);

// Авторизация пользователя
Route::post('/login', [AuthController::class, 'login']);
//Выход
Route::middleware('auth:api')->get('/logout', [AuthController::class, 'logout']);
