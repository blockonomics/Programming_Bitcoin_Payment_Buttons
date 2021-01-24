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

Route::get('/', 'PageController@home')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/new', 'HomeController@handle')->name('new_link');
Route::get('/history', 'HomeController@track')->name('track');
Route::get('/receive', 'WebhookController@handle');
