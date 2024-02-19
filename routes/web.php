<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BerandaUserController;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\BerandaOfficerController;

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
    return view('landing-page');
});
Route::get('/categories', function () {
    return view('categories');
});
Route::get('/deskripsi', function () {
    return view('deskripsiBuku');
});

Auth::routes();

//admin
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('admin.beranda');
    Route::resource('buku', BukuController::class)->names('buku');
});

//officer
Route::prefix('officer')->middleware(['auth', 'auth.officer'])->group(function () {
    Route::get('beranda', [BerandaOfficerController::class, 'index'])->name('officer.beranda');
});

//user
Route::prefix('user')->middleware(['auth', 'auth.user'])->group(function () {
    Route::get('beranda', [BerandaUserController::class, 'index'])->name('user.beranda');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
