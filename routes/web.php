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
    return view('home');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/', 'PagesController@home');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/accesdenied',function(){
    return view('pages.accesdenied');
});

Route::resource('events','EventController');

Route::resource('newsposts','NewsPostController');

Route::resource('reservations','ReservationController');

Route::resource('profile','ProfileController');

Route::resource('rooms','RoomController');

