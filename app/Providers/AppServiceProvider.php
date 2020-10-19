<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\Category;

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
            $view->with(['cates' => $cates, 'brands' =>$brands]);
        });
    }
}
