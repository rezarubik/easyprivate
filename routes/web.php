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

// ! for testing
Route::get('/test', 'HomeController@test')->name('test');
Route::get('/home_guru', 'GuruController@index');

Route::get('/home', 'HomeController@index')->name('home');

// todo halaman login
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

// todo form pendaftaran guru
Route::get('/form_pendaftaran_guru', 'GuruController@form_pendaftaran_guru');
