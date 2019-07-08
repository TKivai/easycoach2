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


Route::get('/booking/index', 'bookingcontroller@index')->name('bookings.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/getstations','bookingcontroller@create');
Route::post('/booking/add','bookingcontroller@store')->name('bookings.store');
Route::delete('/booking/remove/{id}','bookingcontroller@destroy')->name('bookings.destroy');

Route::get('/payment', 'PaymentController@index')->name('payment.index');
// Route::post('/pay','PaymentController@pay')->name('payment.pay');

Route::post('/confirmPayment','PaymentController@confirm');

Auth::routes();

Route::get('/contact','PagesController@contact');
Route::post('/send','mailcontroller@sendmail');
Route::get('/about','PagesController@about');

Route::get('/stations','PagesController@stations');