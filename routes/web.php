<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::view('/', 'index');
Route::view('/collection', 'collection');
Route::view('/detail', 'detail');
Route::view('/season', 'season');
Route::view('/user', 'user');

Route::get('/auth', [AuthController::class, 'showForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/collection', [ProductController::class, 'index']);

Route::get('/api/product/{id}', [ProductController::class, 'show']);
Route::get('/api/product/random', [ProductController::class, 'random']);

// Route::post('/bag', [BagController::class, 'add'])->name('bag.add');
Route::get('/product/random', [ProductController::class, 'random'])->name('product.random');