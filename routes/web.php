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

Route::view('/','index') ->name('home');
Route::post('/inicio','chatController@ingresar')->name('entrar');
Route::post('/chat','chatController@enviarMensaje')->name('insertar');