<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/list-kamar', 'KamarController@getListKamar');
Route::get('/list-kamar/{id}', 'KamarController@getDetailKamar');
Route::get('/pengunjung/{no_ktp}', 'OrderController@getPengunjung');
Route::post('/pesan', 'OrderController@order');
Route::get('/pesan-detail/{id_transaksi}', 'OrderController@getPemesanan');