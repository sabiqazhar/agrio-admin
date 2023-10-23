<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function () {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'dashboardMain')->name('dashboard');
    });
    Route::controller(StoreController::class)->prefix('store')->name('store.')->group(function () {
        Route::get('tabulator', 'tabulator')->name('tabulator');
        Route::get('/', 'list')->name('list');
        Route::post('/', 'addstore')->name('add');
        Route::get('detail/{id}', 'getById')->name('detail');
        Route::patch('update/{id}', 'updateStore')->name('update');
        Route::delete('delete/{id}', 'deleteStore')->name('delete');
    });
    Route::controller(OwnerController::class)->prefix('owner')->name('owner.')->group(function () {
        Route::get('tabulator', 'tabulator')->name('tabulator');
        Route::get('/', 'index')->name('index');
        Route::post('/', 'addOwner')->name('add');
        Route::get('detail/{id}', 'getById')->name('detail');
        Route::patch('update/{id}', 'updateOwner')->name('update');
        Route::delete('delete/{id}', 'deleteOwner')->name('delete');
    });
    Route::controller(UserController::class)->middleware('roles:super_admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('tabulator', 'tabulator')->name('tabulator');
        Route::get('/', 'index')->name('index');
        Route::post('/', 'addUser')->name('add');
        Route::get('detail/{id}', 'getById')->name('detail');
        Route::patch('update/{id}', 'updateUser')->name('update');
        Route::patch('password/{id}', 'updatePassword')->name('update-password');
        Route::delete('delete/{id}', 'deleteUser')->name('delete');
    });
});
