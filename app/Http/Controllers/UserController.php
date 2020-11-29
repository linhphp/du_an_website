<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\News;
use Auth;
use Cart;
use Session;
use Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index ()
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $news = News::all();

        return view('backend.pages.index',compact('users', 'products', 'categories', 'brands', 'news'));
    }

    public function loginAdmin (UserRequest $request)
    {
        $user = User::where([['email', '=', $request->email], ['jurisdiction', 2]])
            ->first();
        if($user){
            if (Hash::check($request->password, $user->password)) {
                Session::put('user', $user);
                
                return redirect()->route('home.admin');
            }
        }

        return redirect()->back();
    }

    public function logoutAdmin ()
    {

        Session::forget('user');

        return redirect()->route('login.admin');
    }

    public function signIn (UserRequest $request)
    {
        $result = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($result)) {
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function signUp (SignUpRequest $request)
    {
        $user = User::create(
            [
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password)
            ]
        );

        $result = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($result)) {

            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function signOut ()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function avatar(Request $request)
    {
        $user = User::find(Auth::id());
        $file = $request->file('avatar');
        $fileName = $request->file('avatar')->getClientOriginalName();
        $user->avatar = $fileName;
        $file->move('storage/image',$fileName);
        $user->save();

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->birth_date = date($request->birth_date);
        $user->gender = $request->gender;
        $user->link_facebook = $request->link_facebook;
        $user->save();

        return redirect()->back();
    }

    public function lock ()
    {
        if (Session::has('user')) {
            if (Session::get('user')->jurisdiction == 2) {
                Session::put('lockScreen', 'lock');
                return redirect()->route('unlock.admin');
            }
        }
    }

    public function checkUnLock ()
    {
        if (Session::has('lockScreen')) {
        
            return view('backend.pages.unLock');
        }

        return redirect()->back();
    }

    public function unlock (Request $request)
    {
        if (Session::has('lockScreen')) {
            $user = User::where([['email', '=', Session::get('user')->email], ['jurisdiction', Session::get('user')->jurisdiction]])
            ->first();
            if($user){
                if (Hash::check($request->password, $user->password)) {
                    Session::forget('lockScreen');
                }
            }
        }

        return redirect()->route('home.admin');
    }
}
