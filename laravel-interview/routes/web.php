<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Controller;

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

// Route::resource('/controller', Controller::class);
// Route::resource('customers', 'App\Http\Controllers\CustomerController');

Route::get('/', function () {return view('welcome');});
Route::get('/farm', function() {return view('farm');});

// Transaction
Route::get('/transactions', 'App\Http\Controllers\TransactionController@index');
Route::delete('/transaction/{id}', 'App\Http\Controllers\TransactionController@destroy');
Route::get('/transaction/{id}', 'App\Http\Controllers\TransactionController@show');

// Customer
Route::get('/customers', 'App\Http\Controllers\CustomerController@index');
Route::get('/customer/create', 'App\Http\Controllers\CustomerController@create');
Route::post('/customer/create', 'App\Http\Controllers\CustomerController@store');
Route::get('/customer/{id}', 'App\Http\Controllers\CustomerController@show');
Route::get('/customer/{id}/edit', 'App\Http\Controllers\CustomerController@edit');
Route::put('/customer/{id}', 'App\Http\Controllers\CustomerController@update');
Route::delete('/customer/{id}', 'App\Http\Controllers\CustomerController@destroy');

// Animal
Route::get('/animals/index', 'App\Http\Controllers\Controller@index');
Route::get('/animals', 'App\Http\Controllers\Controller@selectAnimals');
Route::get('/{type?}/{numberOfAnimals?}', 'App\Http\Controllers\Controller@animals')->name('request','type','numberOfAnimals');
Route::post('/buy', 'App\Http\Controllers\Controller@buy');










