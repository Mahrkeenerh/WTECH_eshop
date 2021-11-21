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

Route::get('/', [HomepageController::class, 'index']);

Route::resource('/category', CategoryController::class);
Route::resource('/item', ItemController::class);
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/add_to_cart/{id}', [CartController::class, 'addToCart']);
Route::get('/cart/remove_from_cart/{id}', [CartController::class, 'removeFromCart']);
Route::resource('/profile', ProfileController::class);
Route::resource('/shipping', ShippingController::class);
Route::resource('/payment', PaymentController::class);
Route::resource('/login', LoginController::class);
Route::resource('/register', RegisterController::class);

Route::resource('test', TestController::class);

require __DIR__.'/auth.php';
