<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CartDetail;
use App\Models\Cart;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer('frontend.layout.aside',function($view){
            $cates = Category::all()->pluck('id','name');
            $brands = Brand::all()->pluck('id','name');
            $view->with(['cates' => $cates, 'brands' =>$brands]);
        });
        view()->composer('frontend.layout.master',function($view){
            $cates = Category::paginate(4)->pluck('id','name');
            $brands = Brand::paginate(4)->pluck('id','name');
            $totalQty = 0;
            $cart = Cart::where([['user_id', Auth::id()], ['status', 1]])->first();
            if ($cart) {
                $cartDetails = CartDetail::where([['cart_id', $cart->id], ['status', null]])->get();
                foreach ($cartDetails as $cartD)
                {
                    $totalQty += $cartD->qty;
                }
            }
            $view->with(['cates' => $cates, 'brands' =>$brands, 'totalQty' => $totalQty]);
        });
    }
}
