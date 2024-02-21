<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BerandaUserController;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\BerandaOfficerController;
use App\Http\Controllers\CategoriesUserController;
use App\Http\Controllers\PeminjamanUserController;

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

Route::get('/', function () {
    return view('pages.landing-page');
});
Route::get('/categories', function () {
    return view('pages.categories');
});

//landing
Route::prefix('/')->group(function () {
    Route::resource('/', LandingController::class);
    Route::get('/categories', [CategoriesUserController::class, 'index'])->name('kategori.user');
});

Auth::routes();

//admin
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('admin.beranda');
    Route::resource('buku', BukuController::class)->names('buku');
    Route::resource('pegawai', PegawaiController::class)->names('pegawai');
    Route::resource('user', UserController::class)->names('user');
});

//officer
Route::prefix('officer')->middleware(['auth', 'auth.officer'])->group(function () {
    Route::get('beranda', [BerandaOfficerController::class, 'index'])->name('officer.beranda');
});

//user
Route::prefix('user')->middleware(['auth', 'auth.user'])->group(function () {
    Route::get('beranda', [BerandaUserController::class, 'index'])->name('user.beranda');
    Route::resource('categories', CategoriesController::class);
    Route::get('/deskripsi/{id}', [LandingController::class, 'show'])->name('deskripsi.show');
    Route::get('dashboard', [BerandaUserController::class, 'show'])->name('user.dashboard');
    Route::resource('peminjaman', PeminjamanUserController::class)->names('peminjaman.user');
    Route::get('/userpinjam/{id}', [PeminjamanUserController::class, 'create'])->name('user.pinjam');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
