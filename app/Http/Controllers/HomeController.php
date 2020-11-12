<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Emage;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use App\Models\Slide;
use App\Models\KindOfNews;
use App\Models\NewsCategory;
use Session;
use Config;
use Illuminate\Support\Facades\Auth;
use Mail;

class HomeController extends Controller
{
    public function message(Request $request)
    {
        echo 'loi';
        // return view('frontend.pages.message');
    }

    public function index (Request $request)
    {
        $slides = Slide::orderBy('id', 'desc')
        ->limit(Config::get('paginate.slide'))->get();
        $getNews = News::inRandomOrder()
            ->limit(Config::get('paginate.news'))
            ->get();
        $brand = Brand::inRandomOrder()->first();
        $brands = Brand::select('image', 'name', 'id')->get();
        $productsByBrand = Product::where('brand_id', $brand->id)
            ->limit(Config::set('paginate.product'))
            ->get();
        $products = Product::orderBy('id', 'desc')
            ->limit(Config::get('paginate.product'))
            ->get();

        return view('frontend.pages.index',compact('products', 'slides', 'getNews', 'brand', 'productsByBrand', 'brands'));
    }

    public function show (Request $request, $id)
    {
        if ($request->ajax() || 'NULL') {
        	$product = Product::find($id);
            if ($product) {
                $brand = Brand::find($product->brand_id);
                $category = Category::find($product->category_id);
                if ($brand && $category) {
                    $relatedProducts = Product::where([['brand_id', $brand->id], ['category_id', $category->id], ['id', '<>', $product->id]])
                        ->get();
                    $comments = Comment::where([['parent_id', $product->id], ['state', 1]])
                        ->orderBy('id', 'desc')
                        ->paginate(5);
                    $producByCategories = Product::where([['category_id', $category->id], ['id', '<>', $product->id]])
                        ->limit(Config::get('paginate.product'))
                        ->get();

                    return view('frontend.pages.productDetail', compact('product', 'relatedProducts', 'comments', 'brand', 'producByCategories'));
                }

            }
        }

        return redirect()->route('message');
    }

    public function eshop (Request $request)
    {
        $categories =Category::all()->pluck('name', 'id');
        $products = Product::join('categories', 'categories.id', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->orderDesc()
            ->paginate(Config::get('paginate.eshop'));

        return view('frontend.pages.product', compact('products', 'categories'));
    }

    public function eshopBrand ($id)
    {
        $brand = Brand::find($id);
        $brands = Brand::all()->pluck('name', 'id');
        if ($brand) {
            $products = Product::where('brand_id', $brand->id)->get();

            return view('frontend.pages.brandProduct', compact('products', 'brand', 'brands'));
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

    public function getNews (Request $request, $id)
    {
        $kindNews = KindOfNews::where('id', $id)->first();
        if (!$kindNews) {
            $getNews = News::join('kind_of_news', 'kind_of_news.id', '=', 'news.kind_of_news_id')
                ->join('news_categories', 'news_categories.id', '=', 'news.news_category_id')
                ->select('news.*', 'kind_of_news.name as kind_name', 'news_categories.name as cate_name')
                ->orderDesc()
                ->paginate(Config::get('paginate.news'));
        }
        else {
            $getNews = News::join('kind_of_news', 'kind_of_news.id', '=', 'news.kind_of_news_id')
                ->join('news_categories', 'news_categories.id', '=', 'news.news_category_id')
                ->select('news.*', 'kind_of_news.name as kind_name', 'news_categories.name as cate_name')
                ->where('news.kind_of_news_id', $id)
                ->orderDesc()
                ->paginate(Config::get('paginate.news'));
        }

        return view('frontend.pages.blog.blog', compact('getNews', 'kindNews'));
    }

    public function getCategories ($id)
    {
        $getCategories = NewsCategory::find($id);
        if ($getCategories) {
            $getNews = News::join('kind_of_news', 'kind_of_news.id', '=', 'news.kind_of_news_id')
                ->join('news_categories', 'news_categories.id', '=', 'news.news_category_id')
                ->select('news.*', 'kind_of_news.name as kind_name', 'news_categories.name as cate_name')
                ->where('news.news_category_id', $id)
                ->orderDesc()
                ->paginate(Config::get('paginate.news'));

            return view('frontend.pages.blog.newsCategories', compact('getNews', 'getCategories'));

        }
    }

    public function viewsPlush ($slug)
    {
        $getPost = News::where('slug', $slug)->first();
        if($getPost){
            $getPost->views++;
            $getPost->save();

            return redirect()->route('getPost', $getPost->slug);
        }
    }

    public function getPost (Request $request, $slug)
    {
        $getPost = news::join('kind_of_news', 'kind_of_news.id', '=', 'news.kind_of_news_id')
            ->join('news_categories', 'news_categories.id', '=', 'news.news_category_id')
            ->select('news.*', 'kind_of_news.name as kind_name', 'news_categories.name as cate_name')
            ->where('slug',$slug)
            ->first();
        if ($getPost) {
            $comments = Comment::where([['parent_id', $getPost->id], ['state', 2]])
                ->orderBy('id', 'desc')
                ->paginate(5);
            $getNews = News::where([['kind_of_news_id', $getPost->kind_of_news_id], ['id', '<>', $getPost->id]])->get();
            return view('frontend.pages.blog.post', compact('getPost', 'getNews', 'comments'));
        }

    }

    public function changeLanguage ($language)
    {
        Session::put('lang', $language);

        return redirect()->back();
    }

    public function aboutUs (Request $request)
    {
        $admins = User::where('jurisdiction', '>' , Config::get('auth.administrators'))->get();

        return view('frontend/pages.aboutUs', compact('admins'));
    }

    public function sendEmail (Request $request)
    {
        $name = $request->name;
        $subject = $request->subject;
        $data['note'] = $request->message;
        $email = $request->email;
        Mail::send('frontend.pages.sendMail', $data, function ($message) use ($email, $name, $subject) {
            $message->from($email, $name);
            $message->to('thuclinh997@gmail.com', 'Cao Thục Linh');
            $message->subject($subject);
        });
        return redirect()->route('message')->with(['successSendEMail' => '']);
    }

    public function getProfile ()
    {

        if (Auth::check()) {
            $user = USer::find(Auth::id());

            return view('frontend.pages.profile', compact('user'));
        }

        return redirect()->route('message');
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$key.'%')
            ->orWhere('price', 'like', $key)
            ->paginate(Config::get('paginate.eshop'));
        return view('frontend.pages.search', compact('products', 'key'));
    }
}
