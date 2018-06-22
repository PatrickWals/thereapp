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

Route::get('/admin','PagesController@adminPage');

Route::get('/allusers', 'PagesController@registeredUsers');

Route::get('/accesdenied', 'PagesController@accesDenied');
//this route enables adding interests and specialities to the database
Route::post('pages', 'PagesController@addData');

Route::get('/dashboard', 'DashboardController@index');

Route::resource('events','EventController');
Route::Post('events','EventController@joinEvent');

Route::resource('newsposts','NewsPostController');

Route::resource('reservations','ReservationController');

Route::resource('profile','ProfileController');

Route::resource('rooms','RoomController');







//Message Routes

// Route::get('/chat', 'ChatsController@index');
// Route::get('messages', 'ChatsController@fetchMessages');
// Route::post('messages', 'ChatsController@sendMessage');

