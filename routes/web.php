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
Route::resource('/posts', 'BlogsController');
Route::resource('/guides', 'GuidesController');
Route::resource('/reviews', 'ReviewsController');

Route::get('email/', 'MailController@update');
Route::get('/games/{game}/{post}', 'GamesController@post');
Route::get('/users/admincontrol/games/create/{user_id}/{game_id}', 'UserRolesController@make_gameadmin');
Route::get('/users/admincontrol/games/delete/{game_admin_id}/{game_id}', 'UserRolesController@remove_gameadmin');
Route::get('/users/admincontrol/webadmin/create/{user_id}', 'UserRolesController@make_webadmin');
Route::get('/users/admincontrol/webadmin/delete/{admin_id}', 'UserRolesController@remove_webadmin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// See welcome.blade.php
