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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('manufacturer', 'ManufacturerController');
Route::resource('carmodel', 'CarModelController');
Route::resource('inventoryview', 'InventoryController');
Route::get('manufacturers-data', 'CarModelController@Manufacturers');
