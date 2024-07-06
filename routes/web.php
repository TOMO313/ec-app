<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRegisteredController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;

Route::get('/', function(){
    return view('Authentication');
});

Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('register', [AdminRegisteredController::class, 'create'])->name('admin.register');
    Route::get('login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('register', [AdminRegisteredController::class, 'store'])->name('admin.registered');
    Route::post('login', [AdminLoginController::class, 'store'])->name('admin.logined');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::post('logout', [AdminLogoutController::class, 'destroy'])->name('admin.logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(StockController::class)->middleware(['auth'])->group(function(){
    Route::get('/index', 'index')->name('dashboard');
    Route::get('/mycart', 'mycart')->name('mycart');
    Route::get('/search', 'search');
    Route::post('/store/{stock}', 'store');
});

require __DIR__.'/auth.php';
