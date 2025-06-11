<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// 🏠 Halaman Galeri (Publik)
Route::get('/', [PhotoController::class, 'index'])->name('photos.index');

// 📸 Detail Foto (berdasarkan slug)
Route::get('/photos/{slug}', [PhotoController::class, 'show'])->name('photos.show');

// 🔐 Login / Logout / Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ✅ Route Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');  // ✅ Tambah name

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
