<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;

// Login & Auth Routes
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Register Routes
Route::get('registeruser', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

// User Routes
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('register', [UserController::class, 'index']);
Route::get('printpdf', [UserController::class, 'printPdf'])->name('printuser');
Route::get('printexcel', [UserController::class, 'userExcel'])->name('exportuser');
Route::get('/category/printpdf', [CategoryController::class, 'printPdf'])->name('category.printpdf');
Route::get('/products/printpdf', [ProductController::class, 'printPdf'])->name('products.printpdf');


// Resource Routes
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('units', UnitController::class);
Route::resource('customers', CustomerController::class);
