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
Route::get('/', 'PublicController@index');


Route::resource('home', 'homeController');


//---------------------------------------------------------
// -------------------- Admin routes ---------------------
Route::prefix('admin')->middleware('isAdmin')->group(function () { });


//---------------------------------------------------------
// -------------------- Owner routes ---------------------
Route::prefix('owner')->middleware('isOwner')->group(function () { });

//---------------------------------------------------------
// -------------------- Customer routes ---------------------
Route::prefix('customer')->middleware('isCustomer')->group(function () { });
