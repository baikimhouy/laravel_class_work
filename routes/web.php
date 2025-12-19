<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    
    // Role Routes
    Route::get('/role-index', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role-create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role-store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role-edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role-update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role-delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');

    // User Routes
    Route::get('/user-index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    // Banner Routes
    Route::get('/banner-index', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/banner-create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner-store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner-edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner-update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner-delete/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

    // Menu Routes
    Route::get('/menu-index', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu-create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu-store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu-edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu-update/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu-delete/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    // Article Routes
    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/show/{id}', [ArticleController::class, 'show'])->name('articles.show');
        Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/update/{id}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/delete/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });

    // Setting Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    // If you need other Setting routes, you can add them here
    // Route::get('/settings/create', [SettingController::class, 'create'])->name('settings.create');
    // Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    // etc.
    
});
