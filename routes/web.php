<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
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

//Login
Route::get('admin/login', [LoginController::class, 'showLoginForm']);
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

//Home Route
Route::get('shop', [HomeController::class, 'showShop']);
Route::get('shop/view', [HomeController::class, 'showShopView']);

//Contact Us
Route::get('contact-us', [HomeController::class, 'showContactUs']);

//About Us
Route::get('about-us', [HomeController::class, 'showAboutUs']);

//Admin Route Here
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    //Dashboard
    Route::get('dashbaord', DashboardController::class)->name('admin.dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::put('password/update', [LoginController::class, 'updatePassword'])->name('password.update');

    //Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::resources([
        'categories' => CategoryController::class,
        'brands' => BrandController::class,
        'products' => ProductController::class,
    ]);
});
