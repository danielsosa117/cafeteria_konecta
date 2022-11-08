<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::controller(ProductoController::class)->group(function(){
    Route::get('/','index')->name('productos.index');
    Route::get('/product/create','create')->name('productos.create');
    Route::get('/product/destroy/{id}','destroy')->name('productos.destroy');
    Route::get('/product/show/{id}','show')->name('productos.show');
    Route::get('/product/edit/{id}','edit')->name('productos.edit');
    Route::post('/product/update/{id}','update')->name('productos.update');
    Route::post('/product/store','store')->name('productos.store');
});

Route::controller(VentaController::class)->group(function(){
    Route::get('/venta','index')->name('ventas.index');
    Route::get('/venta/create','create')->name('ventas.create');
    Route::get('/venta/destroy/{id}','destroy')->name('ventas.destroy');
    Route::get('/venta/show/{id}','show')->name('ventas.show');
    Route::get('/venta/edit/{id}','edit')->name('ventas.edit');
    Route::post('/venta/update/{id}','update')->name('ventas.update');
    Route::post('/venta/store','store')->name('ventas.store');
});
