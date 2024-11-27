<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;


// Регистрация пользователя
Route::post('/register', [AuthController::class, 'register']);

// Авторизация пользователя
Route::post('/login', [AuthController::class, 'login']);
//Выход
Route::middleware('auth:api')->get('/logout', [AuthController::class, 'logout']);


//Просмотр всех товаров
Route::get('/products',[ProductController::class, 'index']);
//Просмотр конкретного товара
Route::get('/products/{id}' , [ProductController::class, 'show']);
//Просмотр категорий
Route::get('/categories',[CategoryController::class, 'index']);
//Просмотр товаров определенной категории
Route::get('/categories/{id}',[CategoryController::class, 'show']);

//Функционал администратора
Route::middleware(['auth:api','role:admin'])->group(function () {
    //Создание продукта
    Route::post('/products/create',[ProductController::class, 'create']);
    //Редактирование продукта
    Route::patch('/products/update/{id}',[ProductController::class, 'update']);
    //Удаление продукта
    Route::delete('/products/destroy/{id}',[ProductController::class, 'destroy']);
    //Создание категории
    Route::post('/categories/create',[CategoryController::class, 'create']);
    //Редактирование категории
    Route::patch('/categories/{id}',[CategoryController::class, 'update']);
    //Удаление категории
    Route::delete('/categories/destroy/{id}',[CategoryController::class, 'destroy']);
});
