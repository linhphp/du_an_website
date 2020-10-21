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

    public function index ()
    {
    	$bills = Bill::join('customers', 'customers.id', '=', 'bills.customer_id')
    	    ->select('bills.*', 'customers.name', 'customers.email', 'customers.phone', 'customers.address')
    	    ->where('customers.user_id', '=', Auth::id())
    	    ->orderBy('id', 'desc')
    	    ->get();
    	if (count($bills) != 0) {

    		return view('frontend.pages.bill', compact('bills'));
    	}

    	return redirect()->back();
    }

    public function show ($id)
    {
    	$bill = Bill::join('customers', 'customers.id', '=', 'bills.customer_id')
    	    ->select('customers.name', 'customers.email', 'customers.phone', 'customers.address', 'bills.id', 'bills.note')
    	    ->where('bills.id', $id)->first();
    	if ($bill) {
    		$billDetails = BillDetail::join('products', 'products.id', '=', 'bill_details.product_id')
    		    ->select('bill_details.*', 'products.name')
    		    ->where('bill_details.bill_id', $bill->id)
    		    ->get();
    		return view('frontend.pages.billDetail', compact('bill', 'billDetails'));
    	}

    	return redirect()->route('message');
    }
}
