<?php

use App\Http\Controllers\article;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('template.index');
});
Route::get('/team', function () {
    return view('template.team');
});
Route::post('admin/article/new', [Article::class, 'create'])->name('article.create');
Route::get('admin/article/new', [Article::class, 'create'])->name('article.create');
Route::delete('admin/article/{id}', [Article::class, 'destroy'])->name('article.destroy');
Route::get('admin/article/{id}', [Article::class, 'show'])->name('article.show');
Route::get('admin/article', [Article::class, 'index'])->name('article.index');
Route::put('admin/article/{id}', [Article::class, 'update'])->name('article.update');
Route::post('admin/article/save', [Article::class, 'store'])->name('article.insert');
Route::get('article/{id}', [Article::class, 'showDetail'])->name('article.show.detail');

Route::get('/login-user', function () {
    return view('auth.login');
})->name('form.login');

Route::get('/dashboard',[PageController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
