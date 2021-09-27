<?php

use App\Http\Controllers\BentukBarangController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SatuanBarangController;

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

Route::resources([
    '/satuan' => SatuanBarangController::class,
    '/bentuk' => BentukBarangController::class,
]);

Route::get('/barang', function () {
    return view('barang');
});
