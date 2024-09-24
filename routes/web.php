<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UlasanController;
use App\Http\Middleware\IsAdmin;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('penulis', PenulisController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('user', UserController::class);
    Route::get('pengajuan/show/{id}', [PeminjamanController::class, 'showpengajuan'])->name('showpengajuan');
    Route::get('pengembalian/show/{id}', [PeminjamanController::class, 'showpengembalian'])->name('showpengembalian');
    Route::get('pengajuan', [PeminjamanController::class, 'indexpengajuan'])->name('indexpengajuan');
    Route::get('peminjaman', [PeminjamanController::class, 'indexpeminjaman'])->name('indexpeminjaman');
    Route::get('pengembalian', [PeminjamanController::class, 'indexpengembalian'])->name('indexpengembalian');
    Route::post('import', [BukuController::class, 'import'])->name('user.import');
});

Route::get('', [PerpusController::class, 'index'])->name(name: 'AssalaamPerpustakaan');

Route::group(['prefix' => 'user'], function () {
    Route::get('show/{id}', [PerpusController::class, 'show']);
    Route::get('listbuku', [PerpusController::class, 'listbuku'])->name('listbuku');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('', [PerpusController::class, 'dashboard'])->name('dashboarduser');
        Route::get('kategori/{id}', [PerpusController::class, 'listbuku'])->name('buku.filter');
        Route::get('profile', [PerpusController::class, 'profile'])->name('profile');
        Route::get('profilelistbuku', [PerpusController::class, 'profilelistbuku'])->name('profilelistbuku');
        Route::get('profilelistbuku/{id}', [PerpusController::class, 'profilelistbuku'])->name('profilelistbuku.filter');
        Route::get('historiuser', [PerpusController::class, 'historiuser'])->name('historiuser');
        Route::resource('peminjaman', PeminjamanController::class);
        Route::get('peminjaman/create/{id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');
        Route::get('pengajuan/show/{id}', [PeminjamanController::class, 'showpengajuanuser'])->name('showpengajuanuser');
        Route::get('pengembalian/show/{id}', [PeminjamanController::class, 'showpengembalianuser'])->name('showpengembalianuser');
        Route::resource('komentar', KomentarController::class);
        Route::resource('kontak', KontakController::class);
        Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan');
        

        // Route::get('ulasan', function () {
        //     return view('user.ulasan');
        // });
    });
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
