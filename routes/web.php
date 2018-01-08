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
Route::post('/updateProfile', 'UserController@updateProfile');


//Account
Route::post('/login', 'LoginController@login');
Route::post('/fbLogin', 'LoginController@fbLogin');
Route::post('/registration', 'LoginController@register');


//Film
Route::get('film','FilmController@route')->name('upload.file');
Route::get('showFilm','FilmController@showFilm');
Route::get('mostPopular','FilmController@mostPopular');
Route::get('specificFilms', 'FilmController@specificFilms');
Route::get('show','FilmController@show');
Route::post('popularReview', 'FilmController@popularReview');
Route::post('search', 'FilmController@search');
Route::post('film','FilmController@store');
Route::post('review','FilmController@review');


