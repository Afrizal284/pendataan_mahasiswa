<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login.user');
});

Route::get('/login', [AuthController::class, 'showUserLogin'])->name('login.user');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.user.post');

Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('login.admin');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('login.admin.post');

Route::get('/admin/register', [AuthController::class, 'showAdminRegister'])->name('register.admin');
Route::post('/admin/register', [AuthController::class, 'registerAdmin'])->name('register.admin.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
});
