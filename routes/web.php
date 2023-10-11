<?php

use Illuminate\Support\Facades\Route;

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
define('PAGINATION', 10);

Route::controller(\App\Http\Controllers\LoginController::class)->middleware('guest:admin')->prefix('login')->group(function () {
    Route::get('', 'login')->name('login');
    Route::post('/post', 'postLogin')->name('login.post');
});

Route::middleware('auth:admin')->group(function () {

    // Dashboard
    Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('logout', 'logout')->name('logout');
    });

    // Profile
    Route::controller(\App\Http\Controllers\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
        Route::get('', 'index')->name('index');
        Route::put('update', 'update')->name('update');
    });

    // Users
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::get('user_search', [\App\Http\Controllers\UserController::class, 'search'])->name('user.search');
    // Journey
    Route::controller(\App\Http\Controllers\JourneyController::class)->prefix('user/journey')->name('user.journey.')->group(function () {
        Route::get('/{user_id}', 'index')->name('index');
        Route::delete('/{journey}/destroy', 'destroy')->name('destroy');
    });
    Route::get('journey_search', [\App\Http\Controllers\JourneyController::class, 'search'])->name('user.journey.search');

    // Remind Category
    Route::resource('remind_category', \App\Http\Controllers\RemindCategoryController::class);

    // Receipt Category
    Route::resource('receipt_category', \App\Http\Controllers\ReceiptCategoryController::class);

});
