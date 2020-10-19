<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Session;

class CartController extends Controller
{
    public function __construct ()
    {
    	$this->middleware('checkout');
    }

    public function cartAdd (Request $request, $id)
    {
        $product = Product::find($id);
        $cartProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => ($product->price - (($product->price * $product->discount)/100)),
            'weight' => 1,
            'options' => ['image' => $product->image]
        ];
        Cart::add($cartProduct);

        return redirect()->route('cart.show'); 
    }
    public function cartShow ()
    {
    	$carts = Cart::content();

        return view('frontend.pages.cart', compact('carts'));
    }
    public function cartRemote ($rowId)
    {
    	Cart::remove($rowId);
    	if (Cart::count() == 0) {
            Cart::destroy();
    	}

    	return redirect()->back();
    }

    public function cartUpdate (Request $request)
    {
    	Cart::update($request->rowId, $request->qty);
    }
}
