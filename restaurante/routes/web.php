<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index')->name('index');
Route::view('/categorias', 'categorias')->name('categorias');
Route::view('/plato','plato')->name('plato');
Route::view('/pedido','pedido')->name('pedido');
