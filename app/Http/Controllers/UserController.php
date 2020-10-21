<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Auth;
use Cart;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index ()
    {
        $users = User::all();
        $products = Product::all();

        return view('backend.pages.index',compact('users', 'products'));
    }

    public function loginAdmin (Request $request)
    {
        $result = array('jurisdiction' => 2, 'email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($result)) {
            return redirect()->route('home.admin');
        }

        return redirect()->back();
    }

    public function logoutAdmin ()
    {

        Auth::logout();

        return redirect()->route('login.admin');
    }

    public function signIn (Request $request)
    {
        $result = array('jurisdiction' => null, 'email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($result)) {
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function signUp (Request $request)
    {
        User::create(
            [
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password)
            ]
        );

        return redirect()->route('signIn')->with(['signUp' => '']);
    }

    public function signOut ()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
