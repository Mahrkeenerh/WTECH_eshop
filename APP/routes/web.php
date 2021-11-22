<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Homepage
Route::get('/', [HomepageController::class, 'index'])
    ->name('home');

// Category
Route::get('/category', [CategoryController::class, 'index'])
    ->name('category');
Route::get('/category/{id}', [CategoryController::class, 'show'])
    ->name('category.show');

// Item
Route::get('/item/{id}', [ItemController::class, 'show'])
    ->name('item.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');
Route::get('/cart/add_to_cart/{id}', [CartController::class, 'addToCart'])
    ->name('cart.add');
Route::get('/cart/remove_from_cart/{id}', [CartController::class, 'removeFromCart'])
    ->name('cart.remove');
Route::get('/cart/remove_one/{id}', [CartController::class, 'removeOne'])
    ->name('cart.remove_one');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');

// Shipping
Route::get('/shipping', [ShippingController::class, 'index'])
    ->name('shipping');

// Payment
Route::get('/payment', [PaymentController::class, 'index'])
    ->name('payment');

Route::resource('test', TestController::class);

// Login, Register
require __DIR__.'/auth.php';
