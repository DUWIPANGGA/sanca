<?php

use App\Http\Controllers\article;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Http\Middleware\authCheck;

Route::get('/', function () {
    return view('template.index');
});
Route::middleware("admin")->group(function () {
    // Add routes here that require authentication and email verification
    Route::get('admin/dashboard', [Article::class, 'main'])->name('article.main');
    Route::post('admin/article/new', [Article::class, 'create'])->name('article.create');
    Route::get('admin/article/new', [Article::class, 'create'])->name('article.create');
    Route::delete('admin/article/{id}', [Article::class, 'destroy'])->name('article.destroy');
    Route::get('admin/article/{id}', [Article::class, 'show'])->name('article.show');
    Route::put('admin/article/{id}', [Article::class, 'update'])->name('article.update');
    Route::post('admin/article/save', [Article::class, 'store'])->name('article.insert');
Route::get('article/{id}', [Article::class, 'showDetail'])->name('article.show.detail');
Route::get('article', [PageController::class,'index'])->name('article.dashboard');
Route::get('admin/user/', [userController::class, 'index'])->name('user.show');
Route::post('admin/user/', [userController::class, 'store'])->name('user.create');
Route::get('admin/user/{id}', [userController::class, 'edit'])->name('user.edit');
Route::put('admin/user/update', [userController::class, 'update'])->name('user.update');
Route::delete('admin/user/{id}', [userController::class, 'destroy'])->name('user.destroy');
});






Route::get('/login-user', function () {
    return view('auth.login');
})->name('form.login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[PageController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('monitoring', [PageController::class,'monitoring'])->name('monitoring');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
