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

Route::get('/api/users','UserController@index');

Route::get('/api/users/{id}','UserController@find');

Route::post('/api/users','UserController@create');

Route::put('/api/users/{id}','UserController@update');

Route::delete('/api/users/{id}','UserController@delete');