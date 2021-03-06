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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'MedicamentController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('medicament', 'MedicamentController');
    Route::resource('exempt', 'ExemptController');
    Route::resource('release', 'ReleaseController');
});

