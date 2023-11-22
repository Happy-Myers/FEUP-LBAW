<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
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
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

//Register
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

// Products
Route::get('/', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Cart
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'create'])->middleware('auth');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->middleware('auth');

//! Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth');;
Route::post('/wishlist/edit', [WishlistController::class, 'add'])->middleware('auth');;
Route::delete('/wishlist/edit', [WishlistController::class, 'delete'])->middleware('auth');;