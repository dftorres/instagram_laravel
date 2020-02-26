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

Auth::routes();

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::post('/post/like/{post}', 'LikesController@store')->name('post.like');
Route::post('/post', 'PostController@store')->name('post.store');

