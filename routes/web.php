<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false, // Menghilangkan route untuk registrasi
    'reset' => false, // Menghilangkan route untuk reset password
    'verify' => false, // Menghilangkan route untuk verifikasi email
    'confirm' => false, // Menghilangkan route untuk konfirmasi password
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile.index');
    Route::post('/profile', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile.update');
    Route::get('/ubah-password', [App\Http\Controllers\HomeController::class, 'password'])->name('password.index');
    Route::post('/ubah-password', [App\Http\Controllers\HomeController::class, 'password_update'])->name('password.update');

    
    Route::resource('/admin', App\Http\Controllers\AdminController::class)->only('index', 'show', 'destroy');

    Route::get('/siswa/diterima', [App\Http\Controllers\CalonSiswaController::class, 'diterima'])->name('siswa.diterima');
    Route::get('/siswa/ditolak', [App\Http\Controllers\CalonSiswaController::class, 'ditolak'])->name('siswa.ditolak');

    Route::post('/siswa/{id}/terima', [App\Http\Controllers\CalonSiswaController::class, 'terima'])->name('siswa.terima');
    Route::post('/siswa/{id}/tolak', [App\Http\Controllers\CalonSiswaController::class, 'tolak'])->name('siswa.tolak');

    Route::resource('/siswa', App\Http\Controllers\CalonSiswaController::class);
});

Route::get('/calon_siswa', [\App\Http\Controllers\CalonSiswaController::class, 'index'])->name('calon_siswa.index');
Route::get('/calon_siswa/create', [\App\Http\Controllers\CalonSiswaController::class, 'create'])->name('calon_siswa.create');
Route::post('/calon_siswa', [\App\Http\Controllers\CalonSiswaController::class, 'store'])->name('calon_siswa.store');
Route::get('/calon_siswa/{id}', [\App\Http\Controllers\CalonSiswaController::class, 'show'])->name('calon_siswa.show');
Route::get('/calon_siswa/{id}/edit', [\App\Http\Controllers\CalonSiswaController::class, 'edit'])->name('calon_siswa.edit');
Route::put('/calon_siswa/{id}', [\App\Http\Controllers\CalonSiswaController::class, 'update'])->name('calon_siswa.update');
Route::delete('/calon_siswa/{id}', [\App\Http\Controllers\CalonSiswaController::class, 'destroy'])->name('calon_siswa.destroy');