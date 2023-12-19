<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AddressController;
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
Route::get('/products/new', [ProductController::class, 'create'])->middleware('admin');
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/admin/products', [ProductController::class, 'manage'])->middleware('admin');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('admin');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('admin');
Route::put('products/{product}', [ProductController::class, 'update'])->middleware('admin');
Route::post('/products', [ProductController::class, 'store'])->middleware('admin');
//

// Cart
Route::get('/cart', [CartController::class, 'index'])->middleware('auth', 'admin.forbidden');
Route::post('/cart/{product}', [CartController::class, 'store'])->middleware('auth', 'admin.forbidden');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->middleware('auth', 'admin.forbidden');
Route::delete('/cart', [CartController::class, 'clear'])->middleware('auth', 'admin.forbidden');
Route::patch('/cart/{product}', [CartController::class, 'update'])->middleware('auth', 'admin.forbidden');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth', 'admin.forbidden');
Route::post('/wishlist/{product}', [WishlistController::class, 'store'])->middleware('auth', 'admin.forbidden');
Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])->middleware('auth', 'admin.forbidden');

// Purchase
Route::post('/checkout', [PurchaseController::class, 'store'])->middleware('auth');
Route::get('/admin/orders', [PurchaseController::class, 'index'])->middleware('admin');
Route::patch('/admin/orders/{purchase}', [PurchaseController::class, 'update'])->middleware('admin');

//User
Route::get('/users/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/edit', [UserController::class, 'update'])->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'show'])->middleware('admin.profile');
Route::delete('/users', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/admin/users', [UserController::class, 'index'])->middleware('admin');
Route::patch('/users/{user}', [UserController::class, 'toggle_ban'])->middleware('admin');


//Address
Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])->middleware('auth');
Route::put('/addresses/{address}', [AddressController::class, 'update'])->middleware('auth');
Route::post('/addresses', [AddressController::class, 'store'])->middleware('auth');

//Reviews
Route::post('/reviews', [ReviewController::class, 'store']);
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->middleware('auth');

//Admin
Route::get('/admin', [AdminController::class, 'show'])->middleware('admin');
