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

Route::get('/', 'PagesController@home');

Route::get('/admin','PagesController@adminpage');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/accesdenied', 'PagesController@accesdenied');

Route::resource('events','EventController');

Route::resource('newsposts','NewsPostController');

Route::resource('reservations','ReservationController');

Route::resource('profile','ProfileController');

Route::resource('rooms','RoomController');


//Message Routes

Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

