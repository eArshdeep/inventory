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

Route::get('/', 'CollectionController@index');

Route::resource('collection', 'CollectionController',
    ['except' => [ 'index' ]]
);

Route::resource('item', 'ItemController');

Route::post('collection/{id}/qr', 'QrController@show');
Route::post('collection/{id}/qr/create', 'QrController@create');
Route::post('scan', 'QrController@verify');
Route::get('scan', 'QrController@scan')->name('scan');
