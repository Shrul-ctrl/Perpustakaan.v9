<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;


use App\Http\Middleware\IsAdmin;




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




Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('home', [DashboardController::class, 'chart']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('penulis', PenulisController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('user', UserController::class);
});

Route::get('', [PerpusController::class, 'index'])->name('AssalaamPerpustakaan');

Route::group(['prefix' => 'user'], function () {
    Route::get('listbuku', [PerpusController::class, 'listbuku'])->name('listbuku');        
    Route::get('kategori/{id}', [PerpusController::class, 'listbuku'])->name('buku.filter');
    Route::get('show/{id}', [PerpusController::class, 'show']);
    Route::get('profile', [PerpusController::class, 'profile'])->name('profile');
    Route::get('dashboarduser', [PerpusController::class, 'dashboard'])->name('dashboarduser');

    
    Route::group(['middleware' => ['auth', IsAdmin::class]], function () {
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('pengembalian', PengembalianController::class);
    });


});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

