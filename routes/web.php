<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\SatuanController;

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
    return view('home');
});

Route::get('/bentuk', function () {
    return view('bentuk_barang');
});

Route::get('/barang', function () {
    return view('barang');
});

Route::get('/barang/{satuan}', [SatuanController::class, 'show']);

Route::resource('/satuan', SatuanBarangController::class);
