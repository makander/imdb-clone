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

Route::post('/search', 'MovieController@searchMovies')->name('search');
Route::post('/movies/search', 'MovieController@searchMovies')->name('search');
Route::post('/movielist/search', 'MovieController@searchMovies')->name('search');
Route::post('/lists/search', 'MovieController@searchMovies')->name('search');

Route::get('/advancedsearch', 'SearchController@index');


Route::get('movies/{id}', 'MovieController@show');

Route::get('/lists', 'ListsController@show')->name('lists');
Route::post('/lists', 'ListsController@store')->name('lists.create');
Route::delete('/lists/{id}', 'ListsController@destroy')->name('lists.destroy');
Route::get('/lists/{id}', 'ListsController@update')->name('lists.update');

Route::get('/movielist/{id}', 'MoviesListController@show')->name('movie.get');
Route::post('/movielist/{id}', 'MoviesListController@store')->name('movielist.store');
Route::delete('/movielist/{id}', 'MoviesListController@delete')->name('movielist.delete');

Route::post('movies/{id}/review', 'ReviewController@store')->name('review.create');
Route::delete('movies/{id}', 'ReviewController@destroy')->name('review.destroy');
Route::get('movies/{id}/updatereview', 'ReviewController@update')->name('review.update');

Route::fallback(
    function () {
        return view('fallback');
    }
);



//Route::get('series', 'SeriesController@index');
//Route::get('cast', 'CastController@index');

Route::post('login', '@index');
Route::post('profile', '@index');
Route::post('signup', '@index');

Route::get('admin', 'AdminController@index')->name('admin');
Route::get('admin/editUser/{id}', 'AdminController@edit')->name('users.edit');
Route::delete('admin/deleteUser/{id}', 'AdminController@delete')->name('users.delete');
Route::get('admin/approveReview/{id}', 'AdminController@update')->name('review.approve');
Route::delete('admin/deleteReview/{id}', 'AdminController@deleteReview')->name('review.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');