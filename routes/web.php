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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'startController@index');
Route::post('/Adlogin', 'startController@login');
Route::get('/logOut', 'startController@logOut');
Route::post('/decedent','decedentController@addDead');
Route::post('/decedent/cregNum','decedentController@cregNum');
Route::post('/decedent/decsave','decedentController@decsave');
Route::post('/decedent/decList','decedentController@decList');
Route::post('/decedent/searchDec','decedentController@searchDec');
Route::post('/decedent/attachs','decedentController@attachs');
Route::post('/decedent/sendDeadDoc','decedentController@sendDeadDoc');
Route::post('/decedent/deleteAttach','decedentController@deleteAttach');
Route::post('/decedent/edit','decedentController@edit');
Route::post('/decedent/decEdit','decedentController@decEdit');
Route::post('/decedent/decEditMongo','decedentController@decEditMongo');
Route::post('/decedent/delete','decedentController@delete');
Route::post('/decedent/deleteDec','decedentController@deleteDec');
