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

Route::get('/', function () {
    return view('welcome');
});

// Examples from class 21/02/201
/*
 * // Optional values have to be inside {} and hey have to be pass to the
 * // lambda as well.
 * Route::get('/welcome/{nombre}/{apellido?}',
 *            function($nombre, $apellido = null) {
 *                // The values are pass with the URL after the page
 *                // request 'https://games-forums/welcome/var1/var2'
 *
 *                // After that we can pass the variables as a hash maep
 *                // to the view with the 'with' metod.
 *                return view('pages.welcome')->with(['nombre' => $nombre,
 *                                                    'apellido' => $apellido]);
 *
 *                // Or we can pass the variables with the actual name of the variable.
 *                // return view('pages.welcome', compac('nombre', 'apellido'));
 *            });
 *  */

// This moves the logic to the controller section.
Route::get('/welcome/', 'PagesController@welcome');

// This gets inserted after we call php artisian make:auth, aparently
// what it does is make magic stuff for user registation.
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// See welcome.blade.php
