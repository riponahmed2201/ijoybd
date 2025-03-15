<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductColorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductSizeController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\CustomerAccountController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

/*
 * Web Module
 * This comment block provides details about the admin module route.
 * It includes the route name and the corresponding URL.
 */

Route::get('/', [HomeController::class, 'index']);


/*
 * Admin Module
 * This comment block provides details about the admin module route.
 * It includes the route name and the corresponding URL.
 */

//Admin Login
Route::get('login', [AuthController::class, 'showLoginForm']);
Route::post('login', [AuthController::class, 'login'])->name('customer.login');

Route::get('register', [AuthController::class, 'showRegisterForm']);
Route::post('register', [AuthController::class, 'register'])->name('customer.register');

//Customer Private Route
Route::group(['middleware' => 'user'], function () {

    //Customer Account Details
    Route::get('my-account-dashboard', [CustomerAccountController::class, 'myAccountDashboard'])->name('customer.dashboard');
    Route::get('my-account-address', [CustomerAccountController::class, 'myAccountAddress']);
    Route::get('my-account-edit', [CustomerAccountController::class, 'myAccountEdit']);
    Route::get('my-account-orders', [CustomerAccountController::class, 'myAccountOrders']);
    Route::get('my-account-wishlist', [CustomerAccountController::class, 'myAccountWishlist']);

    Route::get('/customer/logout', [AuthController::class, 'logout'])->name('customer.logout');
});


//Home Route
Route::get('shop', [HomeController::class, 'showShop']);
Route::get('shop/view/{product}', [HomeController::class, 'showShopView'])->name('shop.view');

//Contact Us
Route::get('contact-us', [HomeController::class, 'showContactUs']);

//About Us
Route::get('about-us', [HomeController::class, 'showAboutUs']);

//Admin Route Here

//Admin Login
Route::get('admin/login', [LoginController::class, 'showLoginForm']);
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    //Dashboard
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::put('password/update', [LoginController::class, 'updatePassword'])->name('password.update');

    //Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::resources([
        'categories' => CategoryController::class,
        'subcategories' => SubcategoryController::class,
        'brands' => BrandController::class,
        'product-colors' => ProductColorController::class,
        'product-sizes' => ProductSizeController::class,
        'products' => ProductController::class,
    ]);

    Route::get('/get-subcategories/{category_id}', [CategoryController::class, 'getSubcategories']);

    //Customers
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');

    //Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    //Order
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
});


//Cart functionality
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
