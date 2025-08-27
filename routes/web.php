<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/', [SiteController::class,'index'])->name('home');
Route::get('/about', [SiteController::class,'about'])->name('about');
Route::get('/contact', [SiteController::class,'contact'])->name('contact');
Route::get('/activities', [SiteController::class,'activities'])->name('activities');
Route::get('/activities/{article:slug}', [SiteController::class, 'showActivity'])->name('activities.show');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
      Route::get('/articlesEditor/{contents}', [ArticleController::class, 'editeur']);
    Route::resources([
        'articles'=>ArticleController::class,
        'categories'=>CategoryController::class,
        'documents'=>DocumentController::class,
        'users'=>UserController::class,
        'roles'=>RoleController ::class,
        'permissions'=>PermissionController::class,
        'settings'=>SettingController::class,
    ]);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::post('/partners/{partner}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
});

require __DIR__.'/auth.php';
