<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@prepaired')->name('prepaired');



Auth::routes();

Route::get('/prepaired', 'HomeController@prepaired')->name('prepaired');
Route::get('/product', 'HomeController@product')->name('product');
Route::get('/success', 'HomeController@success')->name('success');
Route::get('/paymentOrder', 'HomeController@paymentOrder')->name('paymentOrder');
Route::post('/prepaired/topup', 'HomeController@postPrepaired');
Route::post('/product/order', 'HomeController@postOrder');
Route::get('/paymentOrder/{id}', 'HomeController@paymentOrder');
Route::post('/paymentOrder/update', 'HomeController@orderUpdate');
Route::get('/historyOrder', 'HomeController@historyOrder')->name('historyOrder');

Route::get('/email','SendMailController@index');
Route::post('/email/send','SendMailController@send');