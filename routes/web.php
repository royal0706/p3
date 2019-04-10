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

/* Route::get('/', function () {
    return view('welcome');
});
*/
# /routes/web.php
Route::get('/trip/search', 'TripController@search'); # <-- NEW 1 of 2
Route::get('/trip/search-process', 'TripController@searchProcess'); # <-- NEW 2 of 2


Route::get('/', 'TripController@index');