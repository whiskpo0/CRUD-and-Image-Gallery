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
Route::get('/', 'ImageController@album'); 

Route::get('/contacts', 'ContactController@index'); 
Route::get('/contacts/create', 'ContactController@create')->name('contact.create'); 
Route::post('/contacts', 'ContactController@store')->name('contact.store'); 
Route::get('/contacts/{id}/edit', 'ContactController@edit')->name('contact.edit'); 
Route::post('/contacts/{id}/store', 'ContactController@update')->name('contact.update'); 
Route::get('/contacts/{id}', 'ContactController@show')->name('contact.show'); 
Route::post('/contacts/{id}/delete', 'ContactController@destroy')->name('contact.destroy'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/album', 'ImageController@index');
Route::post('/album', 'ImageController@store')->name('album.store');
Route::post('/album/image', 'ImageController@addImage')->name('album.image');
Route::get('/albums/{id}', 'ImageController@show');
Route::post('image/delete', 'ImageController@destroy')->name('image.delete'); 
Route::post('add/album/image','ImageController@albumImage')->name('add.album.image');
Route::get('/upload','ImageController@upload'); 
Route::post('/upload','ImageController@postUpload')->name('upload'); 