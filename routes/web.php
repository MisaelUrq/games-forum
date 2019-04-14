<?php

/*
   |--------------------------------------------------------------------------
   | WebRoutes
   |--------------------------------------------------------------------------
   |
   | Here is where you can register web routes for your application. These
   | routes are loaded by the RouteServiceProvider within a group which
   | contains the "web" middleware group. Now create something great!
   |
 */

// This moves the logic to the controller section.
Route::get('/', 'GamesController@index');

Route::resource('/games', 'GamesController');
Route::resource('/publicmsg', 'PublicMsgController');

Route::get('/games/{game}/{post}', 'GamesController@post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// See welcome.blade.php
