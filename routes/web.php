<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BentukBarangController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;

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
  '/barang' => BarangController::class,
  '/satuan' => SatuanBarangController::class,
  '/bentuk' => BentukBarangController::class,
  '/supplier' => SupplierController::class,
  '/customer' => CustomerController::class,
  '/user' => UserController::class,
  '/phones' => PhoneController::class,
  '/emails' => EmailController::class,
  '/alamats' => AlamatController::class,
  '/purchase' => PurchaseController::class,
  '/sale' => SaleController::class
]);

Route::get('supplier/{supplier}/contact', [SupplierController::class, 'contact']);
Route::resource('supplier.phones', PhoneController::class)->parameter('supplier', 'third_party')->only(['index', 'create', 'store']);
Route::resource('supplier.emails', EmailController::class)->parameter('supplier', 'third_party')->only(['index', 'create', 'store']);
Route::resource('supplier.alamats', AlamatController::class)->parameter('supplier', 'third_party')->only(['index', 'create', 'store']);

Route::get('customer/{customer}/contact', [CustomerController::class, 'contact']);
Route::resource('customer.phones', PhoneController::class)->parameter('customer', 'third_party')->only(['index', 'create', 'store']);
Route::resource('customer.emails', EmailController::class)->parameter('customer', 'third_party')->only(['index', 'create', 'store']);
Route::resource('customer.alamats', AlamatController::class)->parameter('customer', 'third_party')->only(['index', 'create', 'store']);
