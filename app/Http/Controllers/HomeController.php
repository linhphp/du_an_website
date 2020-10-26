<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Emage;
use App\Models\Comment;
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
        if ($product) {
            $brand = Brand::find($product->brand_id);
            if ($brand) {
                $productByBrand = $brand->products
                    ->except($product->id)
                    ->take(4)
                    ->toArray();
                $image = Emage::where('product_id', $product->id)
                    ->inRandomOrder()
                    ->limit(3)->get();
                $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
                    ->select('users.name', 'comments.*')
                    ->where('comments.product_id', $product->id)
                    ->orderBy('id', 'desc')
                    ->paginate(15);
                
                return view('frontend.pages.detail', compact('product', 'productByBrand', 'image', 'comments'));
            }

        }
        return redirect()->route('message');
    }

    public function eshop ()
    {
        $products = Product::orderDesc()->paginate(Config::get('paginate.eshop'));

        return view('frontend.pages.eshop', compact('products'));
    }

    public function eshopBrand ($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $products = $brand->products->toArray();

            return view('frontend.pages.brand_eshop', compact('products', 'brand'));
        }

        return redirect()->route('message');
    }

    public function eshopCategory ($id)
    {
        $category = Category::find($id);
        if ($category) {
            $products = $category->products->toArray();

            return view('frontend.pages.category_eshop', compact('products', 'category'));
        }

        return redirect()->route('message');
    }

    public function changeLanguage ($language)
    {
        Session::put('lang', $language);

        return redirect()->back();
    }
}
