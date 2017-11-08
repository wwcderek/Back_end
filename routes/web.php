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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/{userName}/{test}', 'LoginController@test');
Route::get('test3', 'LoginController@test3');
Route::post('/registration', 'UserController@registration');
//Route::post('/login', 'UserController@login');
Route::post('/login', 'LoginController@login');
Route::get('film','FilmController@route')->name('upload.file');
Route::post('film','FilmController@store');