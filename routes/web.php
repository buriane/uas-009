<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index')->middleware('auth');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create')->middleware('auth');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store')->middleware('auth');
Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show')->middleware('auth');
Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit')->middleware('auth');
Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update')->middleware('auth');
Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy')->middleware('auth');

Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index')->middleware('auth');
Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create')->middleware('auth');
Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen.store')->middleware('auth');
Route::get('/departemen/{departemen}', [DepartemenController::class, 'show'])->name('departemen.show')->middleware('auth');
Route::get('/departemen/{departemen}/edit', [DepartemenController::class, 'edit'])->name('departemen.edit')->middleware('auth');
Route::put('/departemen/{departemen}', [DepartemenController::class, 'update'])->name('departemen.update')->middleware('auth');
Route::delete('/departemen/{departemen}', [DepartemenController::class, 'destroy'])->name('departemen.destroy')->middleware('auth');

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index')->middleware('auth');
Route::get('/jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create')->middleware('auth');
Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store')->middleware('auth');
Route::get('/jabatan/{jabatan}', [JabatanController::class, 'show'])->name('jabatan.show')->middleware('auth');
Route::get('/jabatan/{jabatan}/edit', [JabatanController::class, 'edit'])->name('jabatan.edit')->middleware('auth');
Route::put('/jabatan/{jabatan}', [JabatanController::class, 'update'])->name('jabatan.update')->middleware('auth');
Route::delete('/jabatan/{jabatan}', [JabatanController::class, 'destroy'])->name('jabatan.destroy')->middleware('auth');

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index')->middleware('auth');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create')->middleware('auth');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store')->middleware('auth');
Route::get('/absensi/{absensi}', [AbsensiController::class, 'show'])->name('absensi.show')->middleware('auth');
Route::get('/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit')->middleware('auth');
Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update')->middleware('auth');
Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy')->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

require __DIR__.'/auth.php';
