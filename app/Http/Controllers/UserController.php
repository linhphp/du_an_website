<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Auth;
use Cart;
use Session;
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
        $user = User::where([['email', '=', $request->email], ['jurisdiction', 2]])
            ->first();
        if (Hash::check($request->password, $user->password)) {
            Session::put('user', $user);

            return redirect()->route('home.admin');
        }

        return redirect()->back();
    }

    public function logoutAdmin ()
    {

        Session::forget('user');

        return redirect()->route('login.admin');
    }

    public function signIn (Request $request)
    {
        $result = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($result)) {
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function signUp (Request $request)
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
}
