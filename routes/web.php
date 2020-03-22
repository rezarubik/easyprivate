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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// ! for testing
Route::get('/test', 'HomeController@test')->name('test');

// Dashboard admin
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');

// todo halaman login
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

// ? User Calon Guru
Route::get('user/mentor-dashboard', 'GuruController@index')->name('home');
// todo form pendaftaran guru
Route::get('user/mentor-pendaftaran', 'GuruController@pendaftaranGuru');

// ? Admin
// todo Guru
Route::get('admin/dashboard', 'AdminController@index');
Route::get('users/data-guru', 'UserController@dataGuru');
Route::get('users/data-murid', 'UserController@dataMurid');
Route::get('kriteria-bobot', 'KriteriaBobotController@index');
Route::get('nilai-gap', 'UserController@nilaiGAP');
Route::get('pembobotan-nilai-gap', 'UserController@pembobotanNilaiGAP');
Route::get('hasil-seleksi', 'UserController@hasilSeleksi');
Route::get('video-microteaching', 'UserController@videoMicroteaching');
Route::get('pemesanan', 'PemesananController@index');
Route::get('absensi', 'AbsenController@index');
