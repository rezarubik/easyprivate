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

use App\Http\Requests\Request;

// Route::get('/', function () {
//     return view('welcome');
// });
// todo Company Profile
Route::get('/', function () {
    return view('company_profile.index');
});

Auth::routes();

// ! for testing
Route::get('/test', 'HomeController@test')->name('test');


// todo halaman login
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

// test
Route::get('test', function () {
    return 'Success';
});

// Dashboard Calon Guru
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
// Route::get('/home', 'HomeController@index')->name('home');

// ? User Calon Guru
// Route::get('user/mentor-dashboard', 'GuruController@index');
// todo form pendaftaran guru
// todo Guru
Route::get('/user/create', 'UserController@create');
Route::post('/user', 'UserController@store')->name('user.store');
Route::get('/user-profile/create', 'UserController@createProfile');
Route::post('/user-profile', 'UserController@storeProfile');
Route::post('/getMapelperJenjang', 'MataPelajaranController@getMapelperJenjang')->name('getMapelperJenjang');

// ? Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.home'); // todo dashboard admin
    Route::get('/logout', 'AuthAdmin\LoginController@logoutAdmin')->name('admin.logout');
    Route::get('/users/data-guru', 'AdminController@dataGuru')->name('admin.users.guru');
    Route::get('/users/data-guru/{p}/detail', 'AdminController@show')->name('users.guru.detail');
    Route::get('/users/data-murid', 'AdminController@dataMurid')->name('admin.users.murid');
    Route::get('/kriteria-bobot', 'KriteriaBobotController@index')->name('kriteria.bobot');
    Route::get('/kriteria-bobot/{kbt}/edit', 'KriteriaBobotController@edit')->name('kriteria.bobot.edit');
    Route::patch('/kriteria-bobot/{kbt}/edit', 'KriteriaBobotController@update')->name('kriteria.bobot.update');
    Route::get('/nilai-gap', 'AdminController@nilaiGAP')->name('nilai.gap');
    Route::get('/pembobotan-nilai-gap', 'AdminController@pembobotanNilaiGAP')->name('pembobotan.nilai.gap');
    Route::get('/hasil-seleksi', 'AdminController@hasilSeleksi')->name('hasil.seleksi');
    Route::get('/video-microteaching', 'AdminController@videoMicroteaching')->name('video.microteaching');
    Route::post('/score-video-microteaching', 'AdminController@scoreVideoMicroteaching')->name('penilaian.video.microteaching');
    Route::get('/pemesanan', 'AdminController@indexPemesanan')->name('pemesanan');
    Route::get('/absensi', 'AdminController@indexAbsensi')->name('absensi');
    Route::get('/profile-matching', 'AdminController@hitungProfileMatching')->name('profile.matching');
    Route::get('/cashflow', 'AdminController@cashflow')->name('cashflow');
    Route::get('/pemasukan', 'AdminController@pemasukan')->name('admin.pemasukan');
    Route::get('/pengeluaran', 'AdminController@pengeluaran')->name('admin.pengeluaran');
});

// ? Pemesanan Per Bulan dan Per Jenjang
Route::get('/getGrafikPemesanan', 'AdminController@getGrafikPemesanan')->name('grafik.pemesanan');
Route::get('/getGrafikGuru', 'AdminController@getGrafikGuru')->name('grafik.guru');
Route::get('/getGrafikCashflow', 'AdminController@getGrafikCashflow')->name('grafik.cashflow');
// Route::get('pemesananPerJenjang', 'AdminController@pemesananPerJenjang');
