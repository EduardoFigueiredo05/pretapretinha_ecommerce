<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota da nossa Loja
Route::get('/loja', [ShopController::class, 'index']);
Route::get('/produto/{slug}',[ShopController::class, 'show']);
Route::view('/', 'home');
Route::view('/quem-somos', 'quem-somos');
Route::view('/galeria', 'galeria');
Route::view('/contato', 'contato');
Route::view('/midia', 'midia');