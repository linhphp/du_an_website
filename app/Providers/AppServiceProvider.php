<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\KindOfNews;
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
            $totalPrice = 0;
            $cartDetails = [];
            $cart = Cart::where([['user_id', Auth::id()], ['status', 1]])->first();
            if ($cart) {    
                $cartDetails = CartDetail::join('products', 'products.id', '=', 'cart_details.product_id')
                    ->where([['cart_id', $cart->id], ['destroy', null]])->get();
                foreach ($cartDetails as $cartD)
                {
                    $totalQty += $cartD->qty;
                    $totalPrice += $cartD->price * $cartD->qty;
                }
            }
            $view->with(['cates' => $cates, 'brands' =>$brands, 'totalQty' => $totalQty, 'totalPrice' => $totalPrice, 'cartDetails' => $cartDetails, 'cart' => $cart]);
        });
        view()->composer('frontend.pages.blog.aside', function($view){
            $categories = NewsCategory::all()->pluck('name', 'id');
            $kindOfNews = KindOfNews::select('id','news_category_id','name')->get();
            $letestNews = News::orderBy('id', 'desc')
                ->limit(2)
                ->get();
            $view->with(['categories' => $categories, 'kindOfNews' => $kindOfNews, 'letestNews' => $letestNews]);
        });
    }
}
