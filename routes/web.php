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

Route::get('/', 'MovieController@index');

Route::get('/movies', 'MovieController@index');
Route::get('/movies/{id}', 'MovieController@getSingleMovie');
Route::get('/movies/search/{query}', 'MovieController@searchMovies');
Route::get('/tv/index', 'SeriesController@index');

Route::get('movies', 'MovieController@index');
Route::get('series', 'SeriesController@index');

Route::post('login', '@index');
Route::post('profile', '@index');
Route::post('signup', '@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

