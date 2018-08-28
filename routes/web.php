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

Route::resource('assets', 'AssetController');
Route::resource('holders', 'HolderController');
Route::resource('pos', 'PoController');
Route::get('/holders/assets/{id}', 'AssetController@listperHolder');
Route::get('/receipt/{id}', 'PdfController@index');
Route::post('ADMINreturn', 'ReturnController@adminreturn');
Route::post('ICTreturn', 'ReturnController@ictreturn');
Route::get('/po/assets/{id}', 'AssetController@perpo');
Route::get('/reports/adminstock', 'ReportsController@adminstock');
Route::get('/reports/assets3y', 'ReportsController@assets3y');
Route::get('/reports/ictstock', 'ReportsController@ictstock');
Route::get('/audits/asset/{id}', 'AuditsController@asset');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
