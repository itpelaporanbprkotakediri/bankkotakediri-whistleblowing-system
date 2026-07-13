<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('guest.')->group(function () {
    Route::get('/', fn() => view('guest.beranda'))->name('beranda');
    Route::get('/lapor', fn() => abort(404))->name('lapor');
    Route::get('/cek-status', fn() => abort(404))->name('cek-status');
    Route::get('/panduan', fn() => view('guest.panduan'))->name('panduan');
    Route::get('/kontak', fn() => view('guest.kontak'))->name('kontak');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
