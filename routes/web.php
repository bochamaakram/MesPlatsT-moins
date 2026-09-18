<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DocumentAdminController;
use App\Http\Controllers\Admin\MessageAdminController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\SettingAdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Global contact route for SPA submissions (like the newsletter form) which don't include the locale prefix
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send.global');

Route::prefix('{locale}')->whereIn('locale', ['fr', 'en', 'ar'])->group(function () {

    Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.attempt');
    });

    Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');

    Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::prefix('messages')->name('messages.')->group(function () {
            Route::get('/', [MessageAdminController::class, 'index'])->name('index');
            Route::patch('/{message}/read', [MessageAdminController::class, 'toggleRead'])->name('toggle-read');
            Route::delete('/{message}', [MessageAdminController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingAdminController::class, 'edit'])->name('edit');
            Route::put('/', [SettingAdminController::class, 'update'])->name('update');
            Route::put('/reset', [SettingAdminController::class, 'reset'])->name('reset');
        });

        Route::prefix('documents')->name('documents.')->group(function () {
            Route::get('/', [DocumentAdminController::class, 'index'])->name('index');
            Route::get('/create', [DocumentAdminController::class, 'create'])->name('create');
            Route::post('/', [DocumentAdminController::class, 'store'])->name('store');
            Route::get('/{document}/edit', [DocumentAdminController::class, 'edit'])->name('edit');
            Route::put('/{document}', [DocumentAdminController::class, 'update'])->name('update');
            Route::delete('/{document}', [DocumentAdminController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('pages')->name('pages.')->group(function () {
            Route::get('/', [PageAdminController::class, 'index'])->name('index');
            Route::get('/{page}', [PageAdminController::class, 'edit'])->name('edit');
            Route::put('/{page}', [PageAdminController::class, 'update'])->name('update');
        });
    });
});

// Static front-end (SPA) — must stay last; matches / and all client-side routes.
Route::get('/{locale}/{path?}', [FrontController::class, 'spa'])
    ->whereIn('locale', ['fr', 'en', 'ar'])
    ->where('path', '.*')
    ->name('front.localized');

Route::get('/{path?}', [FrontController::class, 'spa'])
    ->where('path', '.*')
    ->name('front');
