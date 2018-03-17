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

Route::get('/', 'LoginController@showLoginForm');
Route::get('/home', function () {
    return view('home');
});

//User
Route::post('/uploadIcon', 'UserController@uploadIcon');
Route::post('/updateProfile', 'UserController@updateProfile');


//Account
Route::get('/login', 'LoginController@showLoginForm');
Route::post('/adminLogin', 'LoginController@adminLogin');
Route::post('/login', 'LoginController@login');
Route::post('/fbLogin', 'LoginController@fbLogin');
Route::post('/registration', 'LoginController@register');


//Film
Route::get('film','FilmController@route')->name('upload.file');
Route::get('list','FilmController@filmList');
Route::get('latestFilm','FilmController@latestFilm');
Route::get('showFilm','FilmController@showFilm');
Route::get('mostPopular','FilmController@mostPopular');
Route::get('specificFilms', 'FilmController@specificFilms');
Route::get('show','FilmController@show');
Route::post('popularReview', 'FilmController@popularReview');
Route::post('latestReview', 'FilmController@latestReview');
Route::post('search', 'FilmController@search');
Route::post('film','FilmController@store');
Route::post('review','FilmController@review');
Route::post('like','FilmController@like');
Route::post('dislike','FilmController@dislike');

//Barcode
Route::post('createCode','BarcodeController@createCode');
Route::post('scanCode','BarcodeController@scanCode');
Route::get('getCode','BarcodeController@getCode');

//Discount
Route::post('getDiscount','DiscountController@getDiscount');


//Event
Route::get('showEvent', 'EventController@show');
Route::get('test', 'EventController@test');
Route::post('createEvent', 'EventController@store');
Route::post('getDetail', 'EventController@getDetail');
Route::post('eventUser', 'EventController@eventUser');
Route::post('joinEvent', 'EventController@joinEvent');
Route::post('leaveEvent', 'EventController@leaveEvent');
Route::post('getStatus', 'EventController@getStatus');



