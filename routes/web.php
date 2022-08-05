<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/home', [ProductController::class, 'home'])->name('home');
    Route::get('/product-category/{catId}', [ProductController::class, 'categoryProducts']);
    Route::get('product/addToCart/{catId}/{productId}', [ProductController::class, 'addToCart']);
    Route::get('/cart', [CartController::class, 'getCart'])->name('cart');
    Route::get('/cart/add/{productId}', [CartController::class, 'addToCart']);
    Route::get('/cart/reduce/{productId}', [CartController::class, 'reduceToCart']);
    Route::get('/cart/remove/{productId}', [CartController::class, 'removeFromCart']);
    Route::get('/cart/checkout', [CartController::class, 'checkout']);
    Route::resource('/orders', OrderController::class);
});
