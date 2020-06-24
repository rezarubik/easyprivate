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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Absen
Route::get('absen', 'AbsenController@getAbsen'); //Udah bisa
// Route::get('absen/test', 'AbsenController@testCarbon'); //Udah bisa
Route::post('absen_pembayaran', 'AbsenController@pembayaranAbsen'); //Udah bisa
Route::post('absen/filter', 'AbsenController@getAbsenFiltered');
Route::post('absen/store', 'AbsenController@store');
Route::post('absen/tanggalPengganti', 'AbsenController@getTanggalPengganti');
Route::get('absen/test/{id_pemesanan}', 'AbsenController@verifyAbsen'); //Udah bisa
Route::get('absen/{id}', 'AbsenController@getAbsenById'); //Udah bisa

//Jadwal Available
Route::post('jadwalAvailable/filter', 'JadwalAvailableController@getJadwalAvailableFiltered'); //Udah bisa
Route::post('jadwalAvailable/update', 'JadwalAvailableController@updateJadwalAvailable'); //Udah bisa

//jenjang
Route::get('jenjang', 'JenjangController@getJenjang'); //Udah bisa
Route::get('jenjang/{id}', 'JenjangController@getJenjangById'); //Udah bisa

//Mata pelajaran
Route::get('mapel', 'MataPelajaranController@getMapel'); //Udah bisa
Route::get('mapel/{id}', 'MataPelajaranController@getMapelById'); //Udah bisa
Route::get('mapel/jenjang/{id}', 'MataPelajaranController@getMapelByIdJenjang'); //Udah bisa
Route::get('mapel/guru/{id}', 'MataPelajaranController@getMapelByIdGuru'); //Udah bisa

//Pemesanan
Route::get('pemesanan', 'PemesananController@getPemesanan'); //Udah bisa
Route::post('pemesanan/filter', 'PemesananController@getPemesananFiltered'); //Udah bisa
Route::get('pemesanan/{id}', 'PemesananController@getPemesananById'); //Udah bisa
Route::get('pemesanan/guru/{id}', 'PemesananController@getPemesananByIdGuru'); //Udah bisa
Route::get('pemesanan/murid/{id}', 'PemesananController@getPemesananByIdMurid'); //Udah bisa
Route::post('pemesanan/update', 'PemesananController@update'); //Udah bisa
Route::post('pemesanan/tambah_pesanan', 'PemesananController@createPemesanan');
Route::get('pemesanan/conflict/count/{id}', 'PemesananController@getCountOfConflictedPemesanan');
Route::get('pemesanan/conflict/{id}', 'PemesananController@getConflictedPemesanan');

//Jadwal Pemesanan Perminggu
Route::post('pemesanan/jadwal/updateIdEvent', 'JadwalPemesananPermingguController@updateIdEvent');
Route::post('pemesanan/jadwal/filter', 'JadwalPemesananPermingguController@getJadwalPemesananPermingguFiltered'); //Udah bisa
Route::get('pemesanan/jadwal/{id}', 'JadwalPemesananPermingguController@getJadwalPemesananPermingguById'); //Udah bisa

//Pembayaran
Route::get('pembayaran', 'PembayaranController@getPembayaran'); //Udah bisa
Route::get('pembayaran/guru/{id}', 'PembayaranController@getPembayaranByIdGuru'); //Udah bisa
Route::get('pembayaran/murid/{id}', 'PembayaranController@getPembayaranByIdMurid'); //Udah bisa
Route::post('pembayaran/store','PembayaranController@storeDetailPembayaran');

//Login guru
Route::post('login/guru', 'UserController@loginGuru'); //Udah bisa
Route::post('user/guru/valid', 'UserController@isGuruValid'); //Udah bisa

//Guru
Route::post('user/guru', 'UserController@getGuruByEmailPost'); //Udah bisa
Route::post('user/guru/update', 'UserController@updateGuru'); //Udah bisa
Route::get('user/guru/getImage', 'UserController@getImage'); //Test doang

//Murid
Route::post('user/murid', 'UserController@getMuridByEmailPost'); //done
Route::post('user/cari_guru', 'UserController@cariGuru');

//Daftar Murid
Route::post('user/daftar', 'UserController@daftarMurid');

//DetailGuru
Route::get('user/detail/{id}', 'UserController@detailGuru');

//Login Murid
Route::post('user/murid/valid', 'UserController@validMurid');

//Midtrans
Route::post('midtrans/charge','MidtransController@getSnapToken');
// Route::post('midtrans/charge','MidtransController@getSnapTokenAlt');

//test haversine
Route::post('jarak', 'UserController@jarakFilter');