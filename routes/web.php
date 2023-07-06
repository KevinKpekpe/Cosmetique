<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;

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


//admin routes

Route::get('/admin/login', [AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'adminlogin']);
Route::post('/admin/logout', [AdminController::class, 'adminlogout'])->name('admin.logout');


// After
Route::prefix('admin')->name('admin.')->middleware(['auth.admin', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('brand', BrandController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['show']);
});
// client routes

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/signup',[AuthController::class, 'signup'])->name('signup');
Route::post('/signup',[AuthController::class, 'doSignup'])->name('doSignup');
Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/',[ClientController::class, 'index'])->name('welcome');
Route::get('/products',[ClientController::class, 'all'])->name('products');
Route::get('/product/{product}', [ClientController::class,'show'])->name('product.show');
Route::get('/contact', [ClientController::class,'contact'])->name('contact');
Route::post('/contact', [ClientController::class,'sendMessage']);

// cart routes
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart', [CartController::class,'store'])->name('cart.store');
Route::delete('/cart/{rowId}', [CartController::class,'destroy'])->name('cart.destroy');
// checkout routes
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');
Route::get('/merci',function(){
    return view('checkout.thanks');
});
