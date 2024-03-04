<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ADStrukController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StrukUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BerandaUserController;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\BerandaOfficerController;
use App\Http\Controllers\CategoriesUserController;
use App\Http\Controllers\DeskripsiBukuController;
use App\Http\Controllers\PeminjamanUserController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UlasanUserController;

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

//landing
Route::prefix('/')->group(function () {
    Route::resource('/', LandingController::class);
    Route::get('/categories', [CategoriesController::class, 'index'])->name('kategori.user');
    Route::get('/deskripsi/{id}', [LandingController::class, 'show'])->name('deskripsi.show');
});

Auth::routes();

//admin
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('admin.beranda');
    Route::resource('buku', BukuController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('user', UserController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('struk-admin', ADStrukController::class);
});

//officer
Route::prefix('officer')->middleware(['auth', 'auth.officer'])->group(function () {
    Route::get('beranda', [BerandaOfficerController::class, 'index'])->name('officer.beranda');
});

//user
Route::prefix('user')->middleware(['auth', 'auth.user'])->group(function () {
    Route::get('beranda', [BerandaUserController::class, 'index'])->name('user.beranda');
    Route::resource('categories', CategoriesUserController::class);
    Route::get('deskripsi/{id}', [DeskripsiBukuController::class, 'show'])->name('deskripsi.user');
    Route::get('dashboard', [BerandaUserController::class, 'show'])->name('user.dashboard');
    Route::get('peminjaman', [PeminjamanUserController::class, 'index'])->name('peminjaman.user');
    Route::get('peminjaman/create/form/{id}', [PeminjamanUserController::class, 'create'])->name('peminjaman.user.create.form');
    Route::post('peminjaman/create', [PeminjamanUserController::class, 'store'])->name('peminjaman.user.create');
    Route::get('peminjaman/show/{id}', [PeminjamanUserController::class, 'show'])->name('peminjaman.user.show');
    Route::resource('struk', StrukUserController::class);
    Route::resource('koleksi', KoleksiController::class);
    Route::get('ulasan-form/{id}', [UlasanUserController::class, 'create'])->name('ulasan.form');
    Route::post('ulasan-store', [UlasanUserController::class, 'store'])->name('ulasan.store');
    Route::get('ulasan-edit/{id}', [UlasanUserController::class, 'edit'])->name('ulasan.edit');
    Route::put('ulasan-update/{id}', [UlasanUserController::class, 'update'])->name('ulasan.update');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
