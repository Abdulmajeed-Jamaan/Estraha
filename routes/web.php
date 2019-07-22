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

//---------------------------------------------------------
// -------------------- Public routes ---------------------
Route::get('/', 'HomeController@index')->name('home-index');
Route::get('home/show/{id}', 'HomeController@show')->name('home-show');

Route::middleware('auth')->group(function () {

    Route::get('home/create', 'HomeController@create')->name('home-create');
    Route::post('home/store', 'HomeController@store')->name('home-store');

    Route::get('home/{id}/edit', 'HomeController@edit')->name('home-edit');
    Route::put('home/{id}', 'HomeController@update')->name('home-update');

    Route::delete('home/{id}', 'HomeController@delete')->name('home-delete');


    Route::get('city/{city_id}/places', 'HomeController@get_places');
});


//---------------------------------------------------------
// -------------------- Admin routes ---------------------
Route::prefix('admin')->middleware('isAdmin')->group(function () { });


//---------------------------------------------------------
// -------------------- Owner routes ---------------------
Route::prefix('owner')->middleware('isOwner')->group(function () {

    Route::get('myhomes', 'OwnerController@my_homes')->name('owner-myhomes');
});

//---------------------------------------------------------
// -------------------- Customer routes ---------------------
Route::prefix('customer')->middleware('isCustomer')->group(function () { });