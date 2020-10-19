<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Emage;
use Session;
use Config;

class HomeController extends Controller
{
    public function index ()
    {
        $products = Product::inRandomOrder()
            ->limit(Config::get('paginate.product'))
            ->get();

        return view('frontend.pages.index',compact('products'));
    }

    public function show ($id)
    {
    	$product = Product::find($id);
        $productByBrand = Brand::find($product->brand_id)->products
            ->except($product->id)
            ->take(4)
            ->toArray();
        $image = Emage::where('product_id', $product->id)
            ->inRandomOrder()
            ->limit(3)->get();
        return view('frontend.pages.detail', compact('product', 'productByBrand', 'image'));
    }

    public function eshop ()
    {
    	$products = Product::orderDesc()->paginate(Config::get('paginate.eshop'));
        return view('frontend.pages.eshop', compact('products'));
    }

    public function eshopBrand ($id)
    {

    }

    public function eshopCategory ($id)
    {

    }

    
}
