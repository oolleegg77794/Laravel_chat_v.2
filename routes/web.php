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




Route::any('/', 'ChatController@store');

Route::any('/saveindex', 'ChatController@saveindex');



Route::post('/sendMessage', 'ChatController@save');

Route::any('/logs', 'ChatController@getLog');

Route::get('chat/store', 'ChatController@store');

Route::get('chat/getMessages', 'ChatController@getMessages');



Route::any('/soketchat', 'ChatController@soketchat');

Route::any('/soketchatsave', 'ChatController@soketchatsave');

