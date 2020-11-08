<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;
use Auth;
use App\Models\Customer;

class BillController extends Controller
{
    public function __construct ()
    {
    	$this->middleware('checkout');
    }

    public function index (Request $request)
    {
		$bills = Bill::joinCustomer()
    	    ->where('customers.user_id', '=', Auth::id())
    	    ->orderBy('id', 'desc')
    	    ->get();
    	if (count($bills) != 0) {
            $meta_desc = "Chuyên sản phẩm, phụ kiện chính hãng";
			$meta_keywords = "Sản phẩm, phụ kiện điện tử";
			$meta_title ="ThucLinh.shop";
			$url_canonical = $request->url();
    		return view('frontend.pages.bill', compact( 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'bills'));
    	}

    	return redirect()->back();
    }

    public function show (Request $request, $id)
    {

    	$bill = Bill::joinCustomer()
    	    ->where('bills.id', $id)->first();
    	if ($bill) {
			$meta_desc = "Chuyên sản phẩm, phụ kiện chính hãng";
			$meta_keywords = "Sản phẩm, phụ kiện điện tử";
			$meta_title ="ThucLinh.shop";
			$url_canonical = $request->url();
    		$billDetails = BillDetail::joinProduct()
    		    ->where('bill_details.bill_id', $bill->id)
    		    ->get();
    		return view('frontend.pages.billDetail', compact('meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'bill', 'billDetails'));
    	}

    	return redirect()->route('message');
    }
}
