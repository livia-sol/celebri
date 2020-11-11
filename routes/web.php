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

//Auth::routes();
//Route::get('/home','HomeController@index')->('home');

Route::get('/booking_list','BookingController@index');
Route::get('/rezervari/vizualizare/{id}','BookingController@show')->name('bookings.show');
