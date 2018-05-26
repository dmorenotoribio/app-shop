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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/products', 'ProductController@index');					// Listado de productos
    Route::get('/products/create', 'ProductController@create');			// Crear productos
    Route::post('/products', 'ProductController@store');					// Guardar productos
    Route::get('/products/{id}/edit', 'ProductController@edit');			// Editar Productos 
    Route::post('/products/{id}/edit', 'ProductController@update');		// Editar Productos
    Route::post('/products/{id}/delete', 'ProductController@destroy');	// Eliminar Productos 
});

