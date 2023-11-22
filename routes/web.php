<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\WishlistController;

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

//Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - show form to edit listing
// update - update listing
// destroy - Delete listing

// Login
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Register
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Products
Route::get('/', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Cart
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart/{product}', [CartController::class, 'store'])->middleware('auth');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->middleware('auth');
Route::delete('/cart', [CartController::class, 'clear'])->middleware('auth');

//! Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth');
Route::post('/wishlist/{product}', [WishlistController::class, 'add'])->middleware('auth');
Route::delete('/wishlist/{product}', [WishlistController::class, 'delete'])->middleware('auth');

// Purchase
Route::post('/checkout', [PurchaseController::class, 'store'])->middleware('auth');