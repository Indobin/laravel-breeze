<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// Suggested code may be subject to a license. Learn more: ~LicenseLog:2760138354.
Route::get('/',Controllers\HomeController::class)->name('home');
// Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('stores', [Controllers\StoreController::class, 'index'])->name('stores.index');
Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::resource()
Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function(){
        Route::resource('stores', Controllers\StoreController::class)->except('index');
    });
    
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
