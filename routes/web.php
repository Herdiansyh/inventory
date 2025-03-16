<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokBarangController;
use Illuminate\Support\Facades\Route;
use App\Models\Barang;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route untuk profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk barang
    Route::get('/barang', function () {
        return Barang::all();
    })->name('barang.index');

    // Route untuk barang masuk (menggunakan controller)
    Route::resource('/barangMasuk', BarangMasukController::class);
    Route::get('/barangKeluar', [BarangKeluarController::class, 'index'])->name('barang.barangKeluar');
    Route::get('/stok', [StokBarangController::class, 'index'])->name('stok.index');

    // Route resource untuk laporan
    Route::resource('/laporan', LaporanController::class);
});

require __DIR__.'/auth.php';
