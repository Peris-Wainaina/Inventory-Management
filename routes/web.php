<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StationeryController;
use App\Http\Controllers\StockController;

// LOGIN ROUTES
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// DASHBOARD (after login)
Route::middleware('auth')->get('/dashboard', function () {
    return redirect()->route('stationery.index'); // or whatever your stationery route is
})->name('dashboard');
Route::middleware('auth')->get('/dashboard/{section}', [DashboardController::class, 'getSectionContent']);

// ADMIN REGISTER USERS
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/stationery', [StationeryController::class, 'index'])->name('stationery.index');
    Route::get('/orders', [StationeryController::class, 'showOrders'])->name('orders.index');
    Route::post('/stationery/order', [StationeryController::class, 'order'])->name('stationery.order');
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::get('/stationery/{id}/add-stock', [StockController::class, 'addStockForm'])->name('stationery.addStockForm');
    Route::post('/stationery/{id}/add-stock', [StockController::class, 'addStock'])->name('stationery.addStock');
    Route::post('/stock/reduce/{id}/{quantity}', [StockController::class, 'reduceStock'])->name('stock.reduce');
});