<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function loginAdmin (Request $request)
    {
    	$result = array('jurisdiction' => 2, 'email' => $request->email, 'password' => $request->password);
    	if (Auth::attempt($result)) {
            return redirect()->route('home.admin');
    	}

    	return redirect()->back();
    }

    public function logoutAdmin () {

    	Auth::logout();

        return redirect()->route('login.admin');
    }

}
