<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\ProductController;
use App\Http\Controllers\Dashboard\Member\MemberController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'loginView']);
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::get('/admin/product/create', [ProductController::class, 'create']);
    Route::post('/admin/product/create', [ProductController::class, 'store']);
    Route::get('/admin/product/view/{id}', [ProductController::class, 'show']);
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/admin/product/edit/{id}', [ProductController::class, 'update']);
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'memberOnly']], function () {
    Route::get('/dashboard', [MemberController::class, 'index']);
    Route::get('/product', [MemberController::class, 'viewProduct']);
    Route::get('/product/{id}', [MemberController::class, 'viewSingleProduct']);
});
