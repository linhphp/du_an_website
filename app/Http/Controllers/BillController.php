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
    	    ->get();

    	return view('frontend.pages.bill', compact('bills'));
    }

    public function show ($id)
    {
    	$bill = Bill::find($id);
    	if ($bill) {
    		$billDetails = $bill->billDetails->toArray();

    		return view('frontend.pages.billDetail', compact('billDetails'));
    	}

    	return redirect()->route('message');
    }
}
