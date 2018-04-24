<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'ReciboController@index')->name('products');
Route::get('generar-recibos', 'ReciboController@pdf')->name('recibos.pdf');
Route::get('descargar-recibos','ReciboController@descargar')->name('download.recibos');
Route::get('imprimir-recibos','ReciboController@imprimir')->name('imprimir.recibos');

