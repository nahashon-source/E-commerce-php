<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Vendor\DashboardController as VendorDashboard;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Admin Routes
Route::prefix('admin')->group(function (){
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
});

//Vendor Routes
Route::prefix('vendor')->group(function(){
    Route::get('dashboard', [VendorDashboard::class, 'index'])->name('vendor.dashboard');
});

//Customer Routes
Route::prefix('customer')->group(function(){
    Route::get('dashboard', [CustomerDashboard::class, 'index'])->name('customer.dashboard');
});

//Product Routes
Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
