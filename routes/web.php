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

Route::get('/','RoomsController@index');

Route::post('/chat','RoomsController@store');

Route::get('/chat','RoomsController@show');

Route::get('/new','RoomsController@get_new');

Route::get('/setonline','RoomsController@setOnline');

Route::get('/setoffline','RoomsController@setOffline');