<?php

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

//Pemesanan
Route::get('pemesanan', 'PemesananController@index');
Route::get('pemesanan/{id}', 'PemesananController@show');
Route::get('pemesananByIdGuru/{id}', 'PemesananController@getPemesananByIdGuru');
Route::get('pemesananByIdMurid/{id}', 'PemesananController@getPemesananByIdMurid');

//Login guru
Route::post('login/guru', 'UserController@getGuruById');