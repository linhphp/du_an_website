<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use Session;
use Auth;
use Config;
use Mail;

class CartController extends Controller
{
    public function __construct ()
    {
        $this->middleware('checkout');
    }

    public function cartAdd (Request $request, $id)
    {
        $product = Product::find($id);
        if($product) {

            $cart = Cart::where([['user_id', Auth::id()], ['status', 1]])->first();
            if ($cart) {
                $cartDetail = CartDetail::where([['cart_id', $cart->id], ['product_id', $product->id]])
                    ->first();
                if ($cartDetail) {
                    if ($cartDetail->destroy !=null) {
                        $cartDetail->qty = 1;
                        $cartDetail->destroy = null;
                    }
                    else {
                        $cartDetail->qty++;
                    }
                    $cartDetail->save();
                }
                else {
                    $cartDetail = new CartDetail;
                    $cartDetail->cart_id = $cart->id;
                    $cartDetail->product_id = $product->id;
                    if ($request->qty <= 0) {
                        $cartDetail->qty = 1;
                    }
                    else {
                        $cartDetail->qty = $request->qty;
                    }
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
                $cartDetail->qty = $request->qty;
                $cartDetail->save();
                echo 'luu 3';
            }

            return redirect()->route('cart.show');
        }

        return redirect()->route('message');
    }

    public function getCartDetail ($cart)
    {
        return $cartDetails = CartDetail::join('products', 'products.id', '=', 'cart_details.product_id')
            ->select('products.name', 'products.price', 'products.discount', 'products.image1','cart_details.*')
            ->all($cart);
    }

    public function cartShow (Request $request)
    {
        $cart = Cart::where([['user_id', Auth::id()], ['status',1]])->first();
        if ($cart) {
            $cartDetails = $this->getCartDetail($cart->id);

            return view('frontend.pages.checkout.cart', compact('cartDetails', 'cart'));
        }
        return redirect()->route('home');
    }

    public function cartRemove ($id)
    {
    	$cartDetail = CartDetail::find($id);
        if ($cartDetail) {
            $cartDetail->destroy = 1;
            $cartDetail->save();
            $cart = Cart::find($cartDetail->cart_id);
            if ($cart) {
                $cartDetails = CartDetail::where('cart_id', $cart->id)->get();
                $cartTts = 0;
                $del = 0;
                foreach ($cartDetails as $cartD)
                {
                    $del += $cartD->destroy;
                    $cartTts += $cartD->status;
                }
                if($del % $cartTts == 0) {
                    $cart->status = 3;
                    $cart->save();

                    return redirect()->route('home');
                }
            }
        }


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
        $customer = Customer::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(1)->first();
        $provinces = Province::all()->pluck('province_code', 'name');
        $cart = Cart::where([['user_id', Auth::id()], ['status', 1], ['id', $id]])->first();
        if ($cart) {
            $cartDetails = $this->getCartDetail($cart->id);

            return view('frontend.pages.checkout.getFormCheckout',compact('cart', 'cartDetails', 'provinces', 'customer'));

        }
        return redirect()->route('message');
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
        // echo($request->province. ' ' . $request->district. ' ' . $request->ward. ' ' . $request->street);
        // dd($request);
        $cart = Cart::where([['user_id', Auth::id()], ['status', 1], ['id', $id]])->first();
        $cartDetails = $this->getCartDetail($cart->id);
        if($request->address != null) {
            $customer = Customer::where([['user_id', Auth::id()], ['id', $request->address]])->first();
            if ($customer) {
                $customer->batch++;
                $customer->save();
            }
        }
        else {
            $customer = new Customer;
            $customer->user_id = Auth::id();
            $customer->name = ucwords($request->name);
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $this->getAddress($request->province, $request->district, $request->ward, $request->street);
            $customer->save();
        }

        $bill = new Bill;
        $bill->customer_id = $customer->id;
        if ($request->note) {
            $bill->note = $request->note;
        }
        $bill->status_id = 1;
        $bill->payment = $request->payment;
        $bill->total_price = $request->totalPrice;
        $bill->save();

        foreach ($cartDetails as $cartDetail)
        {
            $billDetail = new BillDetail;
            $billDetail->bill_id = $bill->id;
            $billDetail->product_id = $cartDetail->product_id;
            $billDetail->price = $cartDetail->price;
            $billDetail->qty = $cartDetail->qty;
            $billDetail->save();
        }
        $cart->status = 2;
        $cart->save();
        $data['name'] = $customer->name;
        $data['email'] = $customer->email;
        $data['phone'] = $customer->phone;
        $data['note'] = $bill->note;
        $data['payment'] = $bill->payment;
        $data['address'] = $customer->address;
        $data['carts'] = $cartDetails;
        $data['total_price'] = $request->total_price;
        $email = $customer->email;
        $name = $customer->name;
        Mail::send('frontend.pages.checkout.email', $data, function ($message) use ($email, $name) {
            $message->from('lethihohuong@gmail.com', 'Ho Huong');
            $message->to($email, $name);
            $message->cc('thuclinh997@gmail.com', 'Thục Linh');
            $message->subject('Xác nhận thông tin mua hàng');
        });

        return redirect()->route('message')->with(['message' => '']);
    }
}
