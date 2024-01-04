<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
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

// Route::get('/', function () {
//     return view('login');
// });

// login
Route::get('/login', [LoginController::class, "formLogin"]);
Route::post('/login', [LoginController::class, "Login"]);
Route::get('/clearCart', [PegawaiController::class, "clearCart"]);

// Logout
Route::get('/logout', [LoginController::class, "logout"]);

// PEGAWAI
Route::prefix('/pegawai')->middleware("login")->group(function(){
    Route::get('/', [PegawaiController::class, "dashboard"]);
    Route::get('/katalog/{id}', [PegawaiController::class, "formKatalog"]);
    Route::post('/katalog/{id}', [PegawaiController::class, "addToCart"]);
    // Route::get('/barang', [PegawaiController::class, "barang"]);
    // Route::post('/barang', [PegawaiController::class, "addBarang"]);
    // Route::get('/besaran', [PegawaiController::class, "besaran"]);
    // Route::get('/formBesaran', [PegawaiController::class, "formBesaran"]);
    // Route::post('/formBesaran', [PegawaiController::class, "addBesaran"]);
    Route::get('/item', [PegawaiController::class, "formItem"]);
    Route::post('/item', [PegawaiController::class, "itemData"]);
    Route::get('/cart', [PegawaiController::class, "cart"]);
    Route::post('/cart', [PegawaiController::class, "checkout"]);
});

// ADMIN
Route::prefix('/admin')->middleware("login")->group(function(){
    Route::get('/', [AdminController::class, "index"])->middleware('login');
    Route::get('/dashboard', [AdminController::class, "dashboard"])->middleware('login');

    // BARANG
    Route::get('/barang', [AdminController::class, "formAddBarang"]);
    Route::post('/barang', [AdminController::class, "addBarangData"]);
    Route::get('/editBarang/{id}', [AdminController::class, "formEditBarang"]);
    Route::post('/editBarang/{id}', [AdminController::class, "editBarangData"]);
    Route::get('/deleteBarang/{id}', [AdminController::class, "deleteBarang"]);
    Route::get('/disableBarang', [AdminController::class, "disableBarang"]);
    Route::get('/restoreBarang/{id}', [AdminController::class, "restoreBarang"]);

    // SATUAN
    Route::get('/satuan', [AdminController::class, "listSatuan"]);
    Route::post('/satuan', [AdminController::class, "addSatuan"]);
    Route::get('/editSatuan/{id}', [AdminController::class, "formEditSatuan"]);
    Route::post('/editSatuan/{id}', [AdminController::class, "editSatuanData"]);
    Route::get('/deleteSatuan/{id}', [AdminController::class, "deleteSatuan"]);
    Route::get('/disableSatuan', [AdminController::class, "disableSatuan"]);
    Route::get('/restoreSatuan/{id}', [AdminController::class, "restoreSatuan"]);

    // SUPPLIER
    Route::get('/supplier', [AdminController::class, "listSupplier"]);
    Route::post('/supplier', [AdminController::class, "addSupplier"]);
    Route::get('/editSupplier/{id}', [AdminController::class, "formEditSupplier"]);
    Route::post('/editSupplier/{id}', [AdminController::class, "editSupplierData"]);
    Route::get('/deleteSupplier/{id}', [AdminController::class, "deleteSupplier"]);
    Route::get('/disableSupplier', [AdminController::class, "disableSupplier"]);
    Route::get('/restoreSupplier/{id}', [AdminController::class, "restoreSupplier"]);
    Route::get('/fakturPembelian', [AdminController::class, "formFakturPembelian"]);
    Route::post('/fakturPembelian', [AdminController::class, "addFakturPembelian"]);

    // USER
    Route::get('/user', [AdminController::class, "formAddUser"]);
    Route::post('/user', [AdminController::class, "addUserData"]);
    Route::get('/editUser/{id}', [AdminController::class, "formEditUser"]);
    Route::post('/editUser/{id}', [AdminController::class, "editUserData"]);
    Route::get('/banned/{id}', [AdminController::class, "banned"]);
    Route::get('/unbanned/{id}', [AdminController::class, "unbanned"]);

    // LAPORAN
    Route::get('/laporanPembelian', [AdminController::class, "laporanPembelian"]);
    Route::get('/laporanPenjualan', [AdminController::class, "laporanPenjualan"]);
    Route::get('/laporanReturPembelian', [AdminController::class, "laporanPembelian"]);
    Route::get('/laporanPersediaanBarang', [AdminController::class, "laporanPersediaanBarang"]);
    Route::get('/laporanPembayaranHutang', [AdminController::class, "laporanPembayaranHutang"]);
    Route::get('/laporanSaldoHutang', [AdminController::class, "laporanSaldoHutang"]);

});
