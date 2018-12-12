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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('album', 'AlbumController@album');

Route::get('add', 'AlbumController@add')->name('add');
Route::post('save', 'AlbumController@save')->name('save');
Route::get('{id}', 'AlbumController@edit')->name('edit');
Route::post('{id}', 'AlbumController@update')->name('update');
Route::get('delete/{id}', 'AlbumController@delete');

Route::post('upload', 'AlbumController@upload');

Route::get('album/pdf', 'AlbumController@pdf')->name('pdfall');