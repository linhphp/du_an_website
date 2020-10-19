<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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
    Route::resource('products', ProductController::class);
// });
Route::view('login', 'backend.login')->name('login.admin')->middleware(['checklogout']);
Route::post('login', [UserController::class, 'loginAdmin'])->name('login.admin.post');
Route::post('logout', [UserController::class, 'logoutAdmin'])->name('logout.admin.post');
Route::get('error', function(){ echo 'hello'; })->name('error');

//-------------end backend----------------------
Route::prefix('eshop')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('products/{id}', [HomeController::class, 'show'])->name('product.detail');
    Route::get('eshop', [HomeController::class, 'eshop'])->name('eshop');
    Route::get('eshop/{id}/brand', [HomeController::class, 'eshopBrand'])->name('eshop.brand');
    Route::get('eshop/{id}/category', [HomeController::class, 'eshopCategory'])->name('eshop.category');
});