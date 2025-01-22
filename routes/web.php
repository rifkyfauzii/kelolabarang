<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
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



Route::get('/', [BarangController::class, 'index'])->name('dashboard');
// route untuk input barang masuk dan keluar
Route::get('/barangmasuk/create', [BarangController::class, 'formMasuk'])->name('barang.formMasuk');
Route::get('/barangkeluar/create', [BarangController::class, 'formKeluar'])->name('barang.formKeluar');
Route::get('/riwayat', [BarangController::class, 'riwayat'])->name('riwayat');


// route untuk menyimpan barang masuk dan barang keluar
Route::post('/barangmasuk', [BarangController::class, 'storeMasuk'])->name('barang.storeMasuk');
Route::post('/barangkeluar', [BarangController::class, 'storeKeluar'])->name('barang.storeKeluar');
