<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    
    Route::resource('obat', ObatController::class);
     Route::resource('pasien', \App\Http\Controllers\PasienController::class);
     Route::resource('pemeriksaan', \App\Http\Controllers\PemeriksaanController::class);
     Route::resource('pembayaran', \App\Http\Controllers\PembayaranController::class);


});

require __DIR__.'/auth.php';