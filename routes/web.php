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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostsController@home');
Route::resource('/posts', 'PostsController'); // this will look for the "index" method in PostsController

Route::get('/{path?}', 'PostsController@home')->where('path', '.*');