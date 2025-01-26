<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\ExcelObatController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ObatKhususController;
use App\Http\Controllers\ParamKadaluwarsaController;
use App\Http\Controllers\ParamObatKhususController;
use App\Http\Controllers\PerhitunganController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ObatController::class, 'ObatChart'])->name('dashboard');

Route::get('/obat/list-obat', [ObatController::class, 'index'])->name('obat.index');
Route::post('/obat/excel', [ExcelObatController::class,'import_excel']);
Route::get('/obat/list-obat/create', [ObatController::class, 'create'])->name('obat.create');
Route::post('/obat/list-obat/store', [ObatController::class, 'store'])->name('obat.store');
Route::delete('/obat/list-obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
Route::get('/obat/list-obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/list-obat/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::get('/obat/obat-khusus', [ObatKhususController::class, 'index'])->name('obat-khusus.index');

Route::post('/obat/excel', [ExcelObatController::class,'import_excel']);
Route::get('/obat/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/obat/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/obat/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::delete('/obat/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::get('/obat/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::put('/obat/penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');

Route::get('/spk/kriteria', [KriteriaController::class, 'index'])->name('spk.kriteria');
Route::get('/spk/kriteria/create', [KriteriaController::class, 'create'])->name('spk.create');
Route::post('/spk/kriteria/store', [KriteriaController::class, 'store'])->name('spk.store');
Route::delete('/spk/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('spk.destroy');
Route::get('/spk/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('spk.kriteria-edit');
Route::put('/spk/kriteria/{id}', [KriteriaController::class, 'update'])->name('spk.update');

Route::get('/spk/alternatif', [AlternatifController::class, 'index'])->name('spk.alternatif');
Route::get('/spk/alternatif/create', [AlternatifController::class, 'create'])->name('spk.alternatif-create');
Route::post('/spk/alternatif/store', [AlternatifController::class, 'store'])->name('spk.alternatif-store');
Route::get('/spk/alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('spk.alternatif-edit');
Route::put('/spk/alternatif/{id}', [AlternatifController::class, 'update'])->name('spk.alternatif-update');
Route::delete('/spk/alternatif/{id}', [AlternatifController::class, 'destroy'])->name('spk.alternatif-destroy');
Route::get('/spk/alternatif/get-data/{id}', [AlternatifController::class, 'getAlternatifData'])->name('spk.alternatif-get-data');

Route::get('/parameter/kadaluwarsa', [ParamKadaluwarsaController::class, 'index'])->name('parameter.kadaluwarsa');
Route::get('/parameter/kadaluwarsa/create', [ParamKadaluwarsaController::class, 'create'])->name('parameter.create');
Route::post('/parameter/kadaluwarsa/store', [ParamKadaluwarsaController::class, 'store'])->name('parameter.store');
Route::delete('/parameter/kadaluwarsa/{id}', [ParamKadaluwarsaController::class, 'destroy'])->name('parameter.destroy');
Route::get('/parameter/kadaluwarsa/{id}/edit', [ParamKadaluwarsaController::class, 'edit'])->name('parameter.kadaluwarsa-edit');
Route::put('/parameter/kadaluwarsa/{id}', [ParamKadaluwarsaController::class, 'update'])->name('parameter.update');

Route::get('/parameter/obat-khusus', [ParamObatKhususController::class, 'index'])->name('parameter.obat-khusus');
Route::get('/parameter/obat-khusus/create', [ParamObatKhususController::class, 'create'])->name('parameter.khusus_create');
Route::post('/parameter/obat-khusus/store', [ParamObatKhususController::class, 'store'])->name('parameter.khusus_store');
Route::delete('/parameter/obat-khusus/{id}', [ParamObatKhususController::class, 'destroy'])->name('parameter.khusus_destroy');
Route::get('parameter/obat-khusus/{id}/edit', [ParamObatKhususController::class, 'edit'])->name('parameter.khusus-edit');
Route::put('/parameter/obat-khusus/{id}', [ParamObatKhususController::class, 'update'])->name('parameter.khusus_update');

Route::get('/laporan/perhitungan-perangkingan', [PerhitunganController::class, 'index'])->name('laporan.perhitungan');

Route::get('/obat/excel', function () {
    return view('excel.index');
})->middleware(['auth', 'verified'])->name('excel.index');

// Route::get('/obat/search', [ObatController::class, 'search']);

// Route::resource('obat', ObatController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';