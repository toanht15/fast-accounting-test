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

Route::get('/', 'FileController@index');

Route::post('/upload', 'FileController@upload')->name('upload');
Route::get('/convert_to_image/{id}', 'FileController@convertToImage')->name('convert_to_image');
