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

Route::get('/', 'PageController@index');

// Alla rutter för user
//Route::resource('users', 'UsersController');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');

// Alla rutter för posts
Route::resource('posts', 'PostsController');

// Rutter för privatmedelande
Route::get('/messages/send/{user}', 'PrivateMessagesController@create')->name('messages.create');
Route::post('/messages/', 'PrivateMessagesController@store')->name('messages.store');
Route::get('/message/', 'PrivateMessagesController@index')->name('messages.index');

// Alla rutter för kommentarer
//Route::resource('comments', 'CommentsController');
Route::post('/posts/{post}/comments', 'CommentsController@store')->name('comments.store');

Auth::routes();