<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\OrderController;


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
Route::post('/products/create', [ProductController::class, 'create']);
Route::patch('/products/update/{id}', [ProductController::class, 'update']);
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy']);
Route::post('/categories/create', [CategoryController::class, 'create']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy']);

//Функционал пользователя

// Добавление товара в корзину
Route::middleware('auth:api')->post('/products/{id}', [CartController::class, 'addItem']);

// Просмотр корзины
Route::get('/cart', [CartController::class, 'viewCart']);

// Редактирование корзины
Route::patch('/cart', [CartController::class, 'update']);

// Оформление заказа
Route::post('/checkout', [OrderController::class, 'checkout']);

// Просмотр заказов
Route::get('/orders/{id}', [OrderController::class, 'show']);
