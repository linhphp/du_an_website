<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Province;
use Session;
use Auth;

class CartController extends Controller
{
    public function __construct ()
    {
        $this->middleware('checkout');
    }

    public function cartAdd ($id)
    {
        $product = Product::find($id);
        $cart = Cart::where([['user_id', Auth::id()], ['status', 1]])->first();
        if ($cart) {
            $cartDetail = CartDetail::where([['cart_id', $cart->id], ['product_id', $product->id]])
                ->first();
            if ($cartDetail) {
                $cartDetail->qty++;
                $cartDetail->save();
                echo 'luu 1';
            }
            else {
                $cartDetail = new CartDetail;
                $cartDetail->cart_id = $cart->id;
                $cartDetail->product_id = $product->id;
                $cartDetail->qty =1;
                $cartDetail->save();
                echo 'luu 2';
            }
        }
        else {
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->status = 1;
            $cart->save();
            $cartDetail = new CartDetail;
            $cartDetail->cart_id = $cart->id;
            $cartDetail->product_id = $product->id;
            $cartDetail->qty =1;
            $cartDetail->save();
            echo 'luu 3';
        }        

        return redirect()->route('cart.show'); 
    }

    public function getCartDetail ($cart)
    {
        return $cartDetails = CartDetail::join('products', 'products.id', '=', 'cart_details.product_id')
            ->select('products.name', 'products.price', 'products.discount', 'products.image','cart_details.*')
            ->all($cart);
    }

    public function cartShow ()
    {
        $cart = Cart::getOne(Auth::id());
        $cartDetails = $this->getCartDetail($cart->id);

        return view('frontend.pages.cart', compact('cartDetails', 'cart'));
    }
    public function cartRemote ($id)
    {
    	$cartDetail = CartDetail::find($id);
        $cartDetail->status = 1;
        $cartDetail->save();

    	return redirect()->back();
    }

    public function cartUpdate (Request $request)
    {
        $cartDetail = CartDetail::find($request->id);
        $cartDetail->qty = $request->qty++;
        if ($cartDetail->qty <= 0) {
            $cartDetail->qty = 1;
        }
        $cartDetail->save();
    }

    public function getFormCheckout ($id)
    {
        $provinces = Province::all()->pluck('province_code', 'name');
        $cart = Cart::where([['user_id', Auth::id()], ['status', 1], ['id', $id]])->first();
        if ($cart) {
            $cartDetails = $this->getCartDetail($cart->id);

            return view('frontend.pages.checkout',compact('cart', 'cartDetails', 'provinces'));
        }
    }

    public function getAddress($provinceCode, $districtCode, $wardCode, $house)
    {
        $city = Province::getCity($provinceCode);
        $district = District::getDistrict($districtCode);
        $ward = Ward::getWard($wardCode);
        $address = $city->name . ' - ' . $district->name . ' - ' . $ward->name . ' - ' . $house;

        return $address;
    }

    public function checkout (Request $request, $id)
    {
        
    }
}
