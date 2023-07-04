<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
//admin routes

Route::get('/admin/login', [AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'adminlogin']);
Route::post('/admin/logout', [AdminController::class, 'adminlogout'])->name('admin.logout');

// Before

// Route::middleware(['auth.admin', 'admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

//     // routes Products
//     // Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
//     // Route::get('/admin/product/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');

//     // Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
//     // Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');

//     // Route::put('/admin/product/{product}', [ProductController::class, 'update'])->name('admin.product.update');
//     // Route::delete('/admin/product/delete/{product}', [ProductController::class, 'delete'])->name('admin.product.destroy');

//     // routes brands
//     Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands');
//     Route::get('/admin/brand/edit/{brand}', [BrandController::class, 'edit'])->name('admin.brand.edit');

//     Route::get('/admin/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
//     Route::post('/admin/brand/store', [BrandController::class, 'store'])->name('admin.brand.store');

//     Route::put('/admin/brands/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
//     Route::delete('/admin/brand/delete/{brand}', [BrandController::class, 'delete'])->name('admin.brand.destroy');
//     // routes categories
//     Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
//     Route::get('/admin/category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');

//     Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
//     Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');

//     Route::put('/admin/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
//     Route::delete('/admin/category/delete/{category}', [CategoryController::class, 'delete'])->name('admin.category.destroy');
// });

// After
Route::prefix('admin')->name('admin.')->middleware(['auth.admin', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('brand', BrandController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['show']);
});
// client routes
