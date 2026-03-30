<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\MenuSettingController;
use App\Http\Controllers\Admin\SecurityController;
use App\Models\MenuSetting;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');

    Route::middleware('admin.auth')->group(function () {
        Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('meals', MealController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::get('menu-settings', [MenuSettingController::class, 'edit'])->name('menu-settings.edit');
        Route::put('menu-settings', [MenuSettingController::class, 'update'])->name('menu-settings.update');

        Route::get('security/password', [SecurityController::class, 'editPassword'])->name('admin.password.edit');
        Route::put('security/password', [SecurityController::class, 'updatePassword'])->name('admin.password.update');

        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});

Route::get('/', function () {
    $categories = App\Models\Category::with('meals')->get();
    $menuSetting = MenuSetting::query()->first();

    return view('menu', compact('categories', 'menuSetting'));
})->name('public.menu');
