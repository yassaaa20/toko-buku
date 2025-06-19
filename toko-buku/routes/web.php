<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/orders', [OrderController::class, 'index']);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('books', BookController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
});
Route::resource('categories', CategoryController::class); 

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware('auth','admin');