<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('house', ['as' => 'house.index', 'uses' => 'App\Http\Controllers\HouseController@index']);
	Route::get('landlord', ['as' => 'landlord.index', 'uses' => 'App\Http\Controllers\LandlordController@index']);
	Route::get('student', ['as' => 'student.index', 'uses' => 'App\Http\Controllers\StudentController@index']);
	Route::get('house/{id}', 'App\Http\Controllers\HouseController@show')->name('house.show');
	Route::get('landlord/{id}', 'App\Http\Controllers\LandlordController@show')->name('landlord.show');
	Route::get('student/{id}', 'App\Http\Controllers\StudentController@show')->name('student.show');
	Route::get('studenthouse/{id}', 'App\Http\Controllers\StudentController@rumahku')->name('myhouse.show');
	Route::get('house/approve/{id}', 'App\Http\Controllers\HouseController@approve')->name('house.approve');
	Route::get('house/reject/{id}', 'App\Http\Controllers\HouseController@reject')->name('house.reject');
	Route::get('transaction/approve/{id}', 'App\Http\Controllers\TransactionController@approve')->name('transaction.approve');
	Route::get('transaction/reject/{id}', 'App\Http\Controllers\TransactionController@reject')->name('transaction.reject');
	Route::get('house/{id}/map', 'App\Http\Controllers\HouseController@showMap')->name('map.show');
	Route::get('transaction/{id}/receipt', 'App\Http\Controllers\TransactionController@receipt')->name('transaction.receipt');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
