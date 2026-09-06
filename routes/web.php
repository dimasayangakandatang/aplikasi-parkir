<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaKendaraanController;
use App\Http\Controllers\KelolaSettingController;
use App\Http\Controllers\KelolaTarifController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelolaAreaController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('user-management')->name('user-management.')->group(function () {
    Route::get('/', [KelolaUserController::class, 'index'])->name('index');
    Route::post('/', [KelolaUserController::class, 'store'])->name('store');
    Route::put('/{user}', [KelolaUserController::class, 'update'])->name('update');
    Route::delete('/{user}', [KelolaUserController::class, 'destroy'])->name('destroy');
});

Route::prefix('area-management')->name('management.area.')->group(function () {
    Route::get('/', [App\Http\Controllers\KelolaAreaController::class, 'index'])->name('index');
    Route::post('/', [App\Http\Controllers\KelolaAreaController::class, 'store'])->name('store');
    Route::put('/{areaParkir}', [App\Http\Controllers\KelolaAreaController::class, 'update'])->name('update');
    Route::delete('/{areaParkir}', [App\Http\Controllers\KelolaAreaController::class, 'destroy'])->name('destroy');
});
Route::prefix('management')->name('management.')->group(function () {
    Route::get('/tarif', [KelolaTarifController::class, 'index'])->name('tarif.index');
    Route::post('/tarif', [KelolaTarifController::class, 'storeTarif'])->name('tarif.store');
    Route::put('/tarif/{tarif}', [KelolaTarifController::class, 'updateTarif'])->name('tarif.update');
    Route::delete('/tarif/{tarif}', [KelolaTarifController::class, 'destroyTarif'])->name('tarif.destroy');

    Route::post('/jenis-pelanggan', [KelolaTarifController::class, 'storeJenisPelanggan'])->name('jenis-pelanggan.store');
    Route::put('/jenis-pelanggan/{jenisPelanggan}', [KelolaTarifController::class, 'updateJenisPelanggan'])->name('jenis-pelanggan.update');
    Route::delete('/jenis-pelanggan/{jenisPelanggan}', [KelolaTarifController::class, 'destroyJenisPelanggan'])->name('jenis-pelanggan.destroy');

    Route::get('/area', [KelolaAreaController::class, 'index'])->name('area.index');
    Route::post('/area', [KelolaAreaController::class, 'store'])->name('area.store');
    Route::put('/area/{areaParkir}', [KelolaAreaController::class, 'update'])->name('area.update');
    Route::delete('/area/{areaParkir}', [KelolaAreaController::class, 'destroy'])->name('area.destroy');

    Route::get('/kendaraan', [KelolaKendaraanController::class, 'index'])->name('vehicle.index');
    Route::post('/kendaraan', [KelolaKendaraanController::class, 'store'])->name('vehicle.store');
    Route::put('/kendaraan/{kendaraan}', [KelolaKendaraanController::class, 'update'])->name('vehicle.update');
    Route::delete('/kendaraan/{kendaraan}', [KelolaKendaraanController::class, 'destroy'])->name('vehicle.destroy');

    Route::get('/setting', [KelolaSettingController::class, 'index'])->name('setting.index');
    Route::post('/setting', [KelolaSettingController::class, 'store'])->name('setting.store');
    Route::post('/setting/bulk', [KelolaSettingController::class, 'saveBulk'])->name('setting.bulk');
    Route::delete('/setting/{setting}', [KelolaSettingController::class, 'destroy'])->name('setting.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
