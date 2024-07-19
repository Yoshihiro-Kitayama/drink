<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();


Route::get('/home', [App\Http\Controllers\ShohinController::class, 'showList'])->name('list');
Route::get('/', [App\Http\Controllers\ShohinController::class, 'search'])->name('search');

Route::get('/shosai/{id}', [App\Http\Controllers\ShohinController::class, 'shosai'])->name('shosai');
Route::get('/edit/{id}', [App\Http\Controllers\ShohinController::class, 'edit'])->name('edit');
Route::put('/edit/{id}', [App\Http\Controllers\ShohinController::class, 'update'])->name('update');

Route::get('/regist', [App\Http\Controllers\ShohinController::class, 'showRegistForm'])->name('regist');
Route::post('/regist', [App\Http\Controllers\ShohinController::class, 'registSubmit'])->name('submit');


Route::delete('/home/{shohin}', [App\Http\Controllers\ShohinController::class, 'destroy'])->name('destroy');