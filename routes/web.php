<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('');
});

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

Route::get('/product/sortOnASC', [App\Http\Controllers\ProductController::class, 'sortOnASC']);

Route::post('product/storeStockOfProduct/{id}', [App\Http\Controllers\ProductController::class, 'storeStockOfProduct']);

Route::get('category/showproductsbycategory/{id}', [App\Http\Controllers\productController::class, 'getCategoryProducts']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'getAllCategories']);

Route::get('/', [App\Http\Controllers\admin\AdminAuthController::class, 'index']);

Route::get('/admin/editproduct', [App\Http\Controllers\admin\AdminAuthController::class, 'getAllProducts']);

Route::get('/admin/editcategory', [App\Http\Controllers\admin\AdminAuthController::class, 'getAllCategories']);

Route::get('/admin/edituser', [App\Http\Controllers\admin\AdminAuthController::class, 'getAllUsers']);

<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
Route::get('cart/delete/', [App\Http\Controllers\CartController::class, 'emptyCart']);
=======
Route::get('/search',[App\Http\Controllers\ProductController::class, 'search']);

>>>>>>> Stashed changes
>>>>>>> Stashed changes
