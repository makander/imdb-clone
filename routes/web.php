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
Route::get('/lists', 'ListsController@show')->name('lists');
Route::post('/lists', 'ListsController@store');
Route::delete('/lists/{id}', 'ListsController@destroy')->name('lists.destroy');
Route::get('/lists/{id}', 'ListsController@update')->name('lists.update');

Route::get('movies', 'MovieController@index');
Route::get('series', 'SeriesController@index');
Route::get('cast', 'CastController@index');

Route::post('login', '@index');
Route::post('profile', '@index');
Route::post('signup', '@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
