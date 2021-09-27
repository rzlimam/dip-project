<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/satuan', function () {
    return view('satuan_barang');
});

Route::get('/bentuk', function () {
    return view('bentuk_barang');
});

Route::get('/barang', function () {
    return view('barang');
});
