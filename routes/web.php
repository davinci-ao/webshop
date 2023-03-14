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

Route::get('product/details/{id}', [App\Http\Controllers\ProductController::class, 'getProductById']);

Route::get('category/showproductsbycategory/{id}', [App\Http\Controllers\productController::class, 'getCategoryProducts']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'getAllCategories']);

Route::get('/', [App\Http\Controllers\admin\AdminAuthController::class, 'index']);

Route::get('/admin/editproduct', [App\Http\Controllers\admin\AdminAuthController::class, 'getAllProducts']);

Route::get('/admin/editcategory', [App\Http\Controllers\admin\AdminAuthController::class, 'getAllCategories']);

Route::get('/admin/edituser', [App\Http\Controllers\admin\AdminAuthController::class, 'getAllUsers']);

