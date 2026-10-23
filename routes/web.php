<?php

use App\Http\Controllers\approveController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\barangKeluarController;
use App\Http\Controllers\barangMasukController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\penyesuaianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //jenis
    Route::get('/jenis', [jenisController::class, 'index'])->name('jenis.index');
    Route::get('/jenis/create', [jenisController::class, 'create'])->name('jenis.create');
    Route::post('/jenis', [jenisController::class, 'store'])->name('jenis.store');
    Route::get('/jenis/{id_jenis}', [jenisController::class, 'show'])->name('jenis.show');
    //barang
    Route::get('/barang', [barangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [barangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [barangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id_barang}', [barangController::class, 'show'])->name('barang.show');
    //barang Mauk
    Route::get('/barang-masuk', [barangMasukController::class, 'index'])->name('barang_masuk.index');
    Route::get('/barang-masuk/create', [barangMasukController::class, 'create'])->name('barang_masuk.create');
    Route::post('/barang-masuk', [barangMasukController::class, 'store'])->name('barang_masuk.store');
    Route::get('/barang-masuk/{id_barang_masuk}', [barangMasukController::class, 'show'])->name('barang_masuk.show');
    //barang keluar
    Route::get('/barang-keluar', [barangKeluarController::class, 'index'])->name('barang_keluar.index');
    Route::get('/barang-keluar/create', [barangKeluarController::class, 'create'])->name('barang_keluar.create');
    Route::post('/barang-keluar', [barangKeluarController::class, 'store'])->name('barang_keluar.store');
    Route::get('/barang-keluar/{id_barang_keluar}', [barangKeluarController::class, 'show'])->name('barang_keluar.show');
    //penyesuaian
    Route::get('/penyesuaian', [penyesuaianController::class, 'index'])->name('penyesuaian.index');
    Route::get('/penyesuaian/create', [penyesuaianController::class, 'create'])->name('penyesuaian.create');
    Route::post('/penyesuaian', [penyesuaianController::class, 'store'])->name('penyesuaian.store');
    Route::get('/penyesuaian/{id_penyesuaian}', [penyesuaianController::class, 'show'])->name('penyesuaian.show');
    //approve
    Route::get('/persetujuan-akun', [approveController::class, 'index'])->name('approvals.index');
    Route::patch('/persetujuan-akun/{approval}/setujui', [approveController::class, 'approve'])->name('approvals.approve');
    Route::patch('/persetujuan-akun/{approval}/tolak', [approveController::class, 'reject'])->name('approvals.reject');
});

Route::middleware(['auth', 'admin'])->group(function () {
    //jenis
    Route::get('/jenis/{id_jenis}/edit', [jenisController::class, 'edit'])->name('jenis.edit');
    Route::put('/jenis/{id_jenis}', [jenisController::class, 'update'])->name('jenis.update');
    Route::delete('/jenis/{id_jenis}', [jenisController::class, 'destroy'])->name('jenis.delete');
    //barang
    Route::get('/barang/{id_barang}/edit', [barangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id_barang}', [barangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id_barang}', [barangController::class, 'destroy'])->name('barang.delete');
});

require __DIR__ . '/auth.php';
