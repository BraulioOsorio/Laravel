<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Notecontroller;

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

Route::get('/index',[Notecontroller::class,'index']) ->name('index');
Route::get('/create',[Notecontroller::class,'create']) ->name('create');

Route::post('/store',[Notecontroller::class,'store'])->name('store');

Route::get('/edit/{note}',[Notecontroller::class,'edit'])->name('edit');
Route::put('/update/{note}',[Notecontroller::class,'update'])->name('update');
Route::get('/show/{note}',[Notecontroller::class,'show'])->name('show');

Route::delete('/destroy/{note}',[Notecontroller::class,'destroy'])->name('destroy');
