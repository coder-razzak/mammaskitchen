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

Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/reservation', 'ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact', 'ContactController@contact')->name('contact');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    // for slider
    Route::resource('slider', 'SliderController');
    // for category
    Route::resource('category','CategoryController');
    // for Item
    Route::resource('item','ItemController');
    // for Reservation
    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}', 'ReservationController@status')->name('reservation.status');
    Route::post('reservation/delete/{id}', 'ReservationController@destroy')->name('reservation.destroy');
    // for contact
    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::get('contact/{id}/show', 'ContactController@show')->name('contact.show');
    Route::post('contact/{id}/destroy', 'ContactController@destroy')->name('contact.destroy');

});























