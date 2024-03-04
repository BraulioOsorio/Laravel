<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Usuariocontroller;

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

#Categorias
Route::get('/ListaCategorias',[CategoriasController::class,'ListaCategorias'])->name('ListaCategorias');
Route::get('/create',[CategoriasController::class,'create'])->name('create');
Route::post('/store',[CategoriasController::class,'store'])->name('store');
Route::delete('/destroy/{categorias}',[CategoriasController::class,'destroy'])->name('destroy');
Route::put('/update/{categorias}',[CategoriasController::class,'update'])->name('update');
Route::get('/edit/{categorias}',[CategoriasController::class,'edit'])->name('edit');



Route::get('/ListaUsuarios',[Usuariocontroller::class,'ListaUsuarios'])->name('ListaUsuarios');
Route::get('/createU',[Usuariocontroller::class,'createU'])->name('createU');
Route::post('/storeU',[Usuariocontroller::class,'storeU'])->name('storeU');
Route::delete('/destroyU/{usuarios}',[Usuariocontroller::class,'destroyU'])->name('destroyU');
Route::put('/updateU/{usuarios}',[Usuariocontroller::class,'updateU'])->name('updateU');
Route::get('/editU/{usuarios}',[Usuariocontroller::class,'editU'])->name('editU');


Route::view('/plato','plato')->name('plato');
Route::view('/pedido','pedido')->name('pedido');
