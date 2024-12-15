<?php

use App\Http\Controllers\Backend\LoginController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('/', function () {
    return view('welcome');
});
