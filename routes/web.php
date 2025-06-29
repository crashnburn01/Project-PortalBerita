<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminIndexController;
use App\Http\Controllers\tagController;

// ===================
// Route Public
// ===================


// Route::view('/artikel', 'public.article.index');
// Route::view('/reportase', 'public.article.reportase');
// Route::view('/opini', 'public.article.opini');
// Route::view('/featurenews', 'public.article.featurenews');
// Route::view('/article/contoh-artikel', 'public.article.show');

Route::view('/about', 'public.about');
Route::view('/suarapembaca', 'public.suarapembaca');

Route::get('/', [HomeController::class, 'index'])->name('public.home');

Route::get('/artikel', [PublicArticleController::class, 'index'])->name('public.article.index');
Route::get('/artikel/{slug}', [PublicArticleController::class, 'show'])->name('public.article.show');

Route::get('/kategori/{slug}', [PublicArticleController::class, 'byCategory'])->name('kategori');

// Route Dashboard umum (jika ingin dipakai user biasa)
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ===================
// Route Auth Profile
// ===================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===================
// Admin Login Routes
// ===================

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/admin/login')->with('success', 'Anda telah logout.');
})->name('admin.logout');

// ===================
// Admin & Superadmin Routes
// ===================

Route::middleware(['auth', 'role:admin,superadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('index');

    Route::resource('articles', ArticleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('tags', tagController::class);
    
    Route::get('/dashboard', [adminIndexController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'role:superadmin'])->prefix('admin')->name('admin.')->group(function () {
    // Route khusus untuk Super Admin
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
