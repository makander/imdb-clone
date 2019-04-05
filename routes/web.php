<?php

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
Route::get('movies/{id}', 'MovieController@show')->name('movie');
Route::post('movies/{id}/review', 'ReviewController@store');
Route::delete('movies/{id}', 'ReviewController@destroy')->name('review.destroy');
Route::get('movies/{id}/updatereview', 'ReviewController@update')->name('review.update');

Route::get('series', 'SeriesController@index');
Route::get('cast', 'CastController@index');

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
