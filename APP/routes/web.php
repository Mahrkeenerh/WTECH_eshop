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
use App\Http\Controllers\AdminController;

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
Route::post('/category/search', [CategoryController::class, 'search'])
    ->name('category.search');
Route::get('/category/{id}', [CategoryController::class, 'show'])
    ->name('category.show');
Route::post('/category/{id}', [CategoryController::class, 'filter_category'])
    ->name('category.filter_category');
Route::post('/category', [CategoryController::class, 'filter_search'])
    ->name('category.filter_search');


// Item
Route::get('/item/{id}', [ItemController::class, 'show'])
    ->name('item.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');
Route::get('/cart/add_to_cart/{id}', [CartController::class, 'addToCart'])
    ->name('cart.add');
Route::post('/cart/add_to_cart/{id}', [CartController::class, 'addToCartQuantity'])
    ->name('cart.add.quantity');
Route::get('/cart/remove_from_cart/{id}', [CartController::class, 'removeFromCart'])
    ->name('cart.remove');
Route::get('/cart/remove_one/{id}', [CartController::class, 'removeOne'])
    ->name('cart.remove_one');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');
Route::post('/profile', [ProfileController::class, 'store'])
    ->name('profile.store');

// Shipping
Route::get('/shipping', [ShippingController::class, 'index'])
    ->name('shipping');
Route::post('/shipping', [ShippingController::class, 'store'])
    ->name('shipping.store');

// Payment
Route::get('/payment', [PaymentController::class, 'index'])
    ->name('payment');
Route::post('/payment', [PaymentController::class, 'store'])
    ->name('payment.finish');

// Admin
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['can:create,' . \App\Models\Item::class])
    ->name('admin');
Route::get('/admin/new_item', [AdminController::class, 'new_item'])
    ->middleware(['can:create,' . \App\Models\Item::class])
    ->name('new.item');
Route::post('/admin/new_item', [AdminController::class, 'store'])
    ->middleware(['can:create,' . \App\Models\Item::class])
    ->name('create.item');
Route::get('admin/item/{id}', [AdminController::class, 'show'])
    ->middleware(['can:create,' . \App\Models\Item::class])
    ->name('show.item');
Route::post('/admin/update/{id}', [AdminController::class, 'update'])
    ->middleware(['can:create,' . \App\Models\Item::class])
    ->name('update.item');
Route::get('/admin/remove/{id}', [AdminController::class, 'destroy'])
    ->middleware(['can:create,' . \App\Models\Item::class])
    ->name('remove.item');

Route::resource('db', TestController::class);

// Login, Register
require __DIR__.'/auth.php';
