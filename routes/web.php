<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

// 
// Route::middleware(['checklogin'])->group(function () {
    Route::view('/', 'backend.pages.index')->name('home.admin');
    Route::resource('brands', BrandController::class)
        ->except(['create', 'edit', 'show']);
    Route::resource('categories', CategoryController::class)
        ->except(['create', 'edit', 'show']);
    Route::resource('product', ProductController::class);
// });
Route::view('login', 'backend.login')->name('login.admin')->middleware(['checklogout']);
Route::post('login', [UserController::class, 'loginAdmin'])->name('login.admin.post');
Route::post('logout', [UserController::class, 'logoutAdmin'])->name('logout.admin.post');
Route::get('error', function(){ echo 'hello'; })->name('error');

//-------------end backend----------------------
