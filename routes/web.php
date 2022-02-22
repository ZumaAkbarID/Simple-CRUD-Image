<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
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
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product/create', [ProductController::class, 'store']);
    Route::get('/product/view/{id}', [ProductController::class, 'show']);
    Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/product/edit/{id}', [ProductController::class, 'update']);
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);
});
