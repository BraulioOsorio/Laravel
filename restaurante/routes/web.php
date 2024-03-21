<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Usuariocontroller;
use App\Http\controllers\PlatoController;

use App\Http\controllers\CuponController;
use App\Http\controllers\PedidoController;
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


#Usuarios
Route::get('/ListaUsuarios',[Usuariocontroller::class,'ListaUsuarios'])->name('ListaUsuarios');
Route::get('/createU',[Usuariocontroller::class,'createU'])->name('createU');
Route::post('/storeU',[Usuariocontroller::class,'storeU'])->name('storeU');
Route::delete('/destroyU/{usuarios}',[Usuariocontroller::class,'destroyU'])->name('destroyU');
Route::put('/updateU/{usuarios}',[Usuariocontroller::class,'updateU'])->name('updateU');
Route::get('/editU/{usuarios}',[Usuariocontroller::class,'editU'])->name('editU');


#Platos
Route::get('/ListaPlatos',[PlatoController::class,'ListaPlatos'])->name('ListaPlatos');
Route::get('/createP',[PlatoController::class,'createP'])->name('createP');
Route::post('/storeP',[PlatoController::class,'storeP'])->name('storeP');
Route::delete('/destroyP/{platos}',[PlatoController::class,'destroyP'])->name('destroyP');
Route::put('/updateP/{platos}',[PlatoController::class,'updateP'])->name('updateP');
Route::get('/editP/{platos}',[PlatoController::class,'editP'])->name('editP');



#Cupones
Route::get('/ListaCupones',[CuponController::class,'ListaCupones'])->name('ListaCupones');
Route::get('/createC',[CuponController::class,'createC'])->name('createC');
Route::post('/storeC',[CuponController::class,'storeC'])->name('storeC');
Route::delete('/destroyC/{cupon}',[CuponController::class,'destroyC'])->name('destroyC');
Route::put('/updateC/{cupon}',[CuponController::class,'updateC'])->name('updateC');
Route::get('/editC/{cupon}',[CuponController::class,'editC'])->name('editC');

#Pedidos
Route::get('/ListaPedidos',[PedidoController::class,'ListaPedidos'])->name('ListaPedidos');
Route::get('/createD',[PedidoController::class,'createD'])->name('createD');
Route::post('/storeD',[PedidoController::class,'storeD'])->name('storeD');
Route::delete('/destroyD/{pedidos}',[PedidoController::class,'destroyD'])->name('destroyD');
Route::put('/updateD/{pedidos}',[PedidoController::class,'updateD'])->name('updateD');
Route::get('/editD/{pedidos}',[PedidoController::class,'editD'])->name('editD');
Route::get('/ListaPedidoPlatos/{pedidos}',[PedidoController::class,'ListaPedidoPlatos'])->name('ListaPedidoPlatos');