<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StationeryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// LOGIN ROUTES
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.update.picture');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});


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
    Route::post('/stationery/order', [StationeryController::class, 'order'])->name('stationery.order');
    Route::get('/order-status', [StationeryController::class, 'userOrderStatus'])->name('orders.status');


});
Route::middleware('auth', 'is_admin')->group(function () {
    Route::get('/orders', [StationeryController::class, 'showOrders'])->name('orders.index');
    Route::post('/orders/{id}/approve', [StationeryController::class, 'approveOrder'])->name('orders.approve');
    Route::post('/orders/{id}/reject', [StationeryController::class, 'rejectOrder'])->name('orders.reject');

});
Route::middleware('auth', 'is_admin')->group(function () {
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/stock/add/{id}', [StockController::class, 'addStockForm'])->name('stationery.addStock');
Route::post('/stock/add/{id}', [StockController::class, 'addStock'])->name('stationery.addStock.post');
Route::post('/stock/reduce/{id}/{quantity}', [StockController::class, 'reduceStock'])->name('stock.reduce');

});

