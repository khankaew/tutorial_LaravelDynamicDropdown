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

Route::resource('/test','DropdownController');
Route::post('/district','DropdownController@district')->name('query_district');
Route::post('/subdistrict','DropdownController@subdistrict')->name('query_subdistrict');

Route::get('/datatable','DropdownController@datatable');