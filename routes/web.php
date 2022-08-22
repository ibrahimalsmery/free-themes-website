<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ThemeController;
use App\Models\Theme;
use Illuminate\Support\Facades\Route;



Route::get('/', [LandingController::class, 'index_page'])->name('landing.page');



Route::group(['prefix' => '/dashboard', 'as' => 'dashboard.'], function () {

    Route::get('/login', [AuthController::class, 'login_page'])->name('login.page');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [DashboardController::class, 'index_page'])->name('index');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('themes', ThemeController::class);
    });
});

// download theme
Route::get('/download/{theme}', function (Theme $theme) {
    $filepath = storage_path("/app/{$theme->source_link}");
    $theme->increment('downloads');
    return response()->download($filepath, basename($filepath));
})->name('get.private.file');
