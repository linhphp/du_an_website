<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Customer;
use App\Models\CartDetail;
use Config;

class CartAdminController extends Controller
{
    //
    public function cartshows ()
    {
        $carts = Cart::join('users', 'users.id', '=', 'carts.user_id')
            ->select('users.name', 'users.email', 'carts.*')
            ->orderBy('updated_at', 'desc')
            ->paginate(Config::get('paginate.pro'));

        return view('backend.pages.carts.index', compact('carts'));
    }

    public function cartDetail ($id)
    {
        $cartDetails = CartDetail::join('products', 'products.id', '=', 'cart_details.product_id')
            ->select('products.name', 'products.price', 'products.discount', 'cart_details.*')
            ->where('cart_details.cart_id', $id)
            ->get();

        return view('backend.pages.carts.detail', compact('cartDetails'));
    }
}
