<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

//Регистрация
Route::post('/register' , [AuthController::class, 'register' ]);
//Авторизация
Route::post('/login' , [AuthController::class, 'login' ]);
//Выход
Route::middleware('auth:api')->get('/logout', [AuthController::class, 'logout']);
