<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false, // Menghilangkan route untuk registrasi
    'reset' => false, // Menghilangkan route untuk reset password
    'verify' => false, // Menghilangkan route untuk verifikasi email
    'confirm' => false, // Menghilangkan route untuk konfirmasi password
]);

Route::get('/calon_siswa', [\App\Http\Controllers\CalonSiswaController::class, 'index'])->name('calon_siswa.index');
Route::get('/calon_siswa/create', [\App\Http\Controllers\CalonSiswaController::class, 'create'])->name('calon_siswa.create');
Route::post('/calon_siswa', [\App\Http\Controllers\CalonSiswaController::class, 'store'])->name('calon_siswa.store');
Route::get('/calon_siswa/{id}', [\App\Http\Controllers\CalonSiswaController::class, 'show'])->name('calon_siswa.show');
Route::get('/calon_siswa/{id}/edit', [\App\Http\Controllers\CalonSiswaController::class, 'edit'])->name('calon_siswa.edit');
Route::put('/calon_siswa/{id}', [\App\Http\Controllers\CalonSiswaController::class, 'update'])->name('calon_siswa.update');
Route::delete('/calon_siswa/{id}', [\App\Http\Controllers\CalonSiswaController::class, 'destroy'])->name('calon_siswa.destroy');