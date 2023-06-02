<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [App\Http\Controllers\ProductController::class, 'getAllProducts']);

Route::get('product/details/{id}/{category_id}', [App\Http\Controllers\ProductController::class, 'getProductById']);

Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create']);

Route::post('/product', [App\Http\Controllers\ProductController::class, 'store']);

Route::get('product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete']);

Route::get('product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);

Route::post('product/storeProduct/{id}', [App\Http\Controllers\ProductController::class, 'storeProduct']);

Route::get('/product/sortOnPriceHigh', [App\Http\Controllers\ProductController::class, 'sortOnPriceHigh']);

Route::get('/product/sortOnPriceLow', [App\Http\Controllers\ProductController::class, 'sortOnPriceLow']);

Route::get('/product/sortOnNameHigh', [App\Http\Controllers\ProductController::class, 'sortOnNameHigh']);

Route::get('/product/sortOnNameLow', [App\Http\Controllers\ProductController::class, 'sortOnNameLow']);

Route::get('/product/sortByCategory/{id}', [App\Http\Controllers\ProductController::class, 'sortByCategory']);

Route::get('/product/sortOnASC', [App\Http\Controllers\ProductController::class, 'sortOnASC']);

Route::post('product/storeStockOfProduct/{id}', [App\Http\Controllers\ProductController::class, 'storeStockOfProduct']);

Route::get('category/showproductsbycategory/{id}', [App\Http\Controllers\ProductController::class, 'getCategoryProducts']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'getAllCategories']);

Route::get('/', [App\Http\Controllers\Admin\AdminAuthController::class, 'index']);

Route::get('/admin/edituser', [App\Http\Controllers\Admin\AdminAuthController::class, 'getAllUsers']);

Route::get('/search', [App\Http\Controllers\ProductController::class, 'search']);

Route::get('cart/index/', [App\Http\Controllers\CartController::class, 'show']);

Route::post('cart/index/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);
    
Route::get('cart/delete/{id}', [App\Http\Controllers\CartController::class, 'removeProductFromCart']);
    
Route::get('cart/delete/', [App\Http\Controllers\CartController::class, 'emptyCart']);

Route::post('order/index/', [App\Http\Controllers\OrderController::class, 'index']);

Route::get('send-mail', [App\Http\Controllers\OrderController::class, 'sendEmail']);

Route::post('order/information', [App\Http\Controllers\OrderController::class, 'information']);

Route::get('order/information', [App\Http\Controllers\OrderController::class, 'information']);

Route::post('order/delivery', [App\Http\Controllers\OrderController::class, 'delivery']);

Route::post('order/overview', [App\Http\Controllers\OrderController::class, 'overview']);