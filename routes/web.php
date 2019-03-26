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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});
Route::get('/getmovies', 'MovieController@searchMovies');
Route::get('/movies/index', 'MovieController@index');
Route::get('/lists', 'ListsController@show')->name('lists');
Route::post('/lists', 'ListsController@store');
Route::delete('/lists/{id}', 'ListsController@destroy')->name('lists.destroy');
Route::get('/lists/{id}', 'ListsController@update')->name('lists.update');
=======
Route::get('/', 'MovieController@index');

Route::get('/movies', 'MovieController@index');
Route::get('/movies/{id}', 'MovieController@getSingleMovie');
Route::get('/movies/search/{query}', 'MovieController@searchMovies');
Route::get('/tv/index', 'SeriesController@index');
>>>>>>> de695d2d3ccd6d4d0af2491e96ce5998882e7a50

Route::get('movies', 'MovieController@index');
Route::get('series', 'SeriesController@index');
Route::get('login', '@index');
Route::get('signup', '@index');
