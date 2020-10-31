<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController\BrandController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\AdminController\CartAdminController;
use App\Http\Controllers\AdminController\BillAdminController;
use App\Http\Controllers\AdminController\NewsCategoryController;
use App\Http\Controllers\AdminController\KindOfNewsController;
use App\Http\Controllers\AdminController\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CommentController;

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
Route::middleware(['checklogin'])->group( function ()
{
    Route::get('/', [UserController::class, 'index'])
        ->name('home.admin');
    Route::resource('brands', BrandController::class)
        ->except(['create', 'edit', 'show']);
    Route::resource('categories', CategoryController::class)
        ->except(['create', 'edit', 'show']);
    Route::resource('products', ProductController::class);
    Route::prefix('carts')->group( function ()
    {
       Route::get('/', [CartAdminController::class, 'cartShows'])->name('adminCart.show'); 
       Route::get('cart/{id}', [CartAdminController::class, 'cartDetail'])->name('adminCart.detail'); 
    });
    Route::group(['middleware' => 'locale'], function() { 
        Route::middleware(['checklogin'])->group( function ()
        {
            Route::get('/', [UserController::class, 'index'])
                ->name('home.admin');
            Route::resource('brands', BrandController::class)
                ->except(['create', 'edit', 'show']);
            Route::resource('categories', CategoryController::class)
                ->except(['create', 'edit', 'show']);
            Route::resource('products', ProductController::class);
            Route::prefix('carts')->group( function ()
            {
               Route::get('/', [CartAdminController::class, 'cartShows'])->name('adminCart.show'); 
               Route::get('cart/{id}', [CartAdminController::class, 'cartDetail'])->name('adminCart.detail'); 
            });
            Route::prefix('bills-admin')->group( function ()
            {
                route::get('/', [BillAdminController::class, 'billShows'])->name('billAdmin.show');
                route::get('update', [BillAdminController::class, 'billUpdate'])->name('billAdmin.update');
                route::get('{id}/detail', [BillAdminController::class, 'billDetail'])->name('billAdmin.detail');
            });
        });

Route::view('login', 'backend.login')
        ->name('login.admin')
        ->middleware(['checklogout']);
    Route::post('login', [UserController::class, 'loginAdmin'])
        ->name('login.admin.post');
    Route::post('logout', [UserController::class, 'logoutAdmin'])
        ->name('logout.admin.post');
    Route::get('error', function(){ echo 'ahihi đồ ngốc!'; })
        ->name('error');

    //-------------end backend----------------------
    Route::prefix('index')->group( function ()
{
    Route::get('/', [HomeController::class, 'index'])
            ->name('home');
        Route::get('products/{id}', [HomeController::class, 'show'])
            ->name('product.detail');
        Route::get('eshop', [HomeController::class, 'eshop'])
            ->name('eshop');
        Route::get('eshop/{id}/brand', [HomeController::class, 'eshopBrand'])
            ->name('eshop.brand');
        Route::get('eshop/{id}/category', [HomeController::class, 'eshopCategory'])
            ->name('eshop.category');
        Route::get('districts/{id}', [AddressController::class, 'getDistricts']);
        Route::get('wards/{id}', [AddressController::class, 'getWards']);
        Route::view('message', 'frontend.pages.message')->name('message');
        Route::post('comment/{id}', [CommentController::class, 'store'])->name('comment.post');
        Route::post('childen/{id}', [CommentController::class, 'addChildenComment'])->name('childen.post');
        Route::prefix('checkout')->group( function ()
        {
            Route::post('cart/{id}', [CartController::class, 'cartAdd'])
                ->name('cart.add');
            Route::get('cart/show', [CartController::class, 'cartShow'])
                ->name('cart.show');
            Route::get('cart/update', [CartController::class, 'cartUpdate'])
                ->name('cart.update');
            Route::post('cart/{id}/remote', [CartController::class , 'cartRemote'])
                ->name('cart.remote');
            Route::get('cart/{id}/checkout', [CartController::class, 'getFormCheckout'])->name('checkout.get');
            Route::post('cart/{id}/checkout', [CartController::class, 'checkout'])->name('checkout.post');
        });
        Route::prefix('user')->group( function ()
        {
            Route::view('sign-in', 'frontend.pages.signin')
                ->name('signIn')
                ->middleware('checkoutUser');
            Route::view('sign-up', 'frontend.pages.signup')
                ->name('signUp');
            Route::post('sign-up', [UserController::class, 'signUp'])->name('signup.post');
            Route::post('sign-in', [UserController::class, 'signIn'])
                ->name('sigin.post');
            Route::post('sign_out', [UserController::class, 'signOut'])
                ->name('signOut.post');
        });
        Route::prefix('bills')->group( function ()
        {
            Route::get('/', [BillController::class , 'index'])->name('bills.index');
            Route::get('{id}', [BillController::class , 'show'])->name('bills.show');
        });
        Route::get('change-language/{language}', [HomeController::class, 'changeLanguage'])->name('change_language');
    });
    });
});