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


//User
Route::post('/uploadIcon', 'UserController@uploadIcon');


//Account
Route::post('/login', 'LoginController@login');
Route::post('/registration', 'LoginController@register');


//Film
Route::get('film','FilmController@route')->name('upload.file');
Route::post('film','FilmController@store');
Route::get('show','FilmController@show');

