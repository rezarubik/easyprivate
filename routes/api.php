<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Pemesanan;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Absen
Route::get('absen', 'AbsenController@getAbsen'); //Udah bisa
Route::get('absen/{id}', 'AbsenController@getAbsenById'); //Udah bisa
Route::get('absen/guru/{id}', 'AbsenController@getAbsenByIdGuru'); //Udah bisa
Route::get('absen/murid/{id}', 'AbsenController@getAbsenByIdMurid'); //Udah bisa
Route::post('absen/store', 'AbsenController@store'); //

//Jadwal ajar
Route::get('jadwalAjar/{id}', 'JadwalAjarController@getJadwalAjarById');
Route::get('jadwalAjar/guru/{id}', 'JadwalAjarController@getJadwalAjarByIdGuru');

//jenjang
Route::get('jenjang', 'JenjangController@getJenjang'); //Udah bisa
Route::get('jenjang/{id}', 'JenjangController@getJenjangById');

//Mata pelajaran
Route::get('mapel', 'MataPelajaranController@getMapel'); //Udah bisa
Route::get('mapel/{id}', 'MataPelajaranController@getMapelById'); //Udah bisa
Route::get('mapel/jenjang/{id}', 'MataPelajaranController@getMapelByIdJenjang'); //Udah bisa
Route::get('mapel/guru/{id}', 'MataPelajaranController@getMapelByIdGuru'); //Udah bisa

//Pemesanan
Route::get('pemesanan', 'PemesananController@getPemesanan'); //Udah bisa
Route::post('pemesanan/filter', 'PemesananController@getPemesananFiltered');
Route::get('pemesanan/{id}', 'PemesananController@getPemesananById'); //Udah bisa
Route::get('pemesanan/guru/{id}', 'PemesananController@getPemesananByIdGuru'); //Udah bisa
Route::get('pemesanan/murid/{id}', 'PemesananController@getPemesananByIdMurid'); //Udah bisa
Route::post('pemesanan/update', 'PemesananController@update'); //Udah bisa

//Pembayaran
Route::get('pembayaran', 'PembayaranController@getPembayaran'); //Udah bisa
Route::get('pembayaran/guru/{id}', 'PembayaranController@getPembayaranByIdGuru'); //Udah bisa
Route::get('pembayaran/murid/{id}', 'PembayaranController@getPembayaranByIdMurid'); //Udah bisa

//Login guru
Route::post('login/guru', 'UserController@loginGuru'); //Udah bisa
Route::post('user/guru/valid', 'UserController@isGuruValid'); //Udah bisa

//User
Route::post('user/guru', 'UserController@getGuruByEmailPost'); //Udah bisa
Route::post('user/guru/update', 'UserController@updateGuru');
Route::get('user/guru/getImage', 'UserController@getImage');
Route::post('user/murid', 'UserController@getMuridByEmailPost'); //done

//Daftar Murid
Route::post('user/daftar', 'UserController@daftarMurid');

//Lpgin Murid
Route::post('user/murid/valid', 'UserController@validMurid');
