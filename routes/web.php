<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CategoryController;

// 🏠 Halaman Galeri (Publik)
Route::get('/', [PhotoController::class, 'index'])->name('photos.index');

// 📸 Detail Foto (berdasarkan slug)
Route::get('/photos/{slug}', [PhotoController::class, 'show'])->name('photos.show');

// 🔐 Rute yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    // 📷 CRUD Foto (tanpa index dan show karena publik)
    Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
    Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
    Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

    // 🗂️ CRUD Kategori
    Route::resource('categories', CategoryController::class);
});