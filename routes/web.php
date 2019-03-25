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
Route::get('/getmovies', 'MovieController@searchMovies');
Route::get('/movies/index', 'MovieController@index');
Route::get('/tv/index', 'SeriesController@index');
 
Route::get('movies', 'MovieController@index');
Route::get('series', 'SeriesController@index');
Route::get('cast', 'CastController@index');

Route::post('login', '@index');
Route::post('profile', '@index');
Route::post('signup', '@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
