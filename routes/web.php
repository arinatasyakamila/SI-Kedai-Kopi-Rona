<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\KategoriBarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    // Semua route dalam grup ini akan menggunakan middleware 'auth'
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::resource('/vendor', VendorController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/barang', BarangController::class);
    Route::resource('/kategoribarang', KategoriBarangController::class);
    Route::resource('/barangmasuk', BarangMasukController::class);
    Route::resource('/barangkeluar', BarangKeluarController::class);

});
