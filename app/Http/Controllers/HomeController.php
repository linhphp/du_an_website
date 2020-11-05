<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Emage;
use App\Models\Comment;
use App\Models\News;
use Session;
use Config;
use Illuminate\Support\Facades\Auth;
use Mail;

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
    public function getNews ()
    {
        $getNews = News::join('kind_of_news', 'kind_of_news.id', '=', 'news.kind_of_news_id')
            ->join('news_categories', 'news_categories.id', '=', 'news.new_categories_id')
            ->select('news.*', 'kind_of_news.name as kind_name', 'news_categories.name as cate_name')

            ->orderDesc()
            ->paginate(Config::get('paginate.pro'));

        return view('frontend.pages.news', compact('getNews'));
    }

    public function getPost (Request $request, $slug)
    {
        $getPost = news::where('slug',$slug)
            ->first();

        return view('frontend.pages.post', compact('getPost'));
    }

    public function changeLanguage ($language)
    {
        Session::put('lang', $language);

        return redirect()->back();
    }

    public function aboutUs()
    {
        $admins = User::where('jurisdiction', '>' , Config::get('auth.administrators'))->get();

        return view('frontend/pages.aboutUs', compact('admins'));
    }

    public function sendEmail(Request $request)
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

    public function getProfile()
    {
        if (Auth::check()) {
            $user = USer::find(Auth::id());

            return view('frontend.pages.profile', compact('user'));
        }

        return redirect()->route('message');
    }
}
