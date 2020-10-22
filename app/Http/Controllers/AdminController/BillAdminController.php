<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Status;
use Config;

class BillAdminController extends Controller
{
    public function billShows ()
    {
    	$status = Status::all()->pluck('id', 'name');
    	$bills = Bill::join('customers', 'customers.id', '=', 'bills.customer_id')
    	    ->select('customers.name', 'customers.email', 'customers.phone', 'customers.address', 'bills.*')
    	    ->orderBy('updated_at', 'desc')
    	    ->paginate(Config::get('paginnate.pro'));

    	return view('backend.pages.bills.index', compact('bills', 'status'));
    }

    public function billUpdate (Request $request)
    {
    	$bill = Bill::find($request->id);
    	$bill->status_id = $request->status;
    	$bill->save();
    }

    public function billDetail ($id)
    {
    	$billDetails = BillDetail::join('products', 'products.id', '=', 'bill_details.product_id')
    	    ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
    	    ->select('bill_details.*', 'products.name', 'bills.total_price')
    	    ->where('bill_details.bill_id', $id)
    	    ->get();
    	$customer = Bill::find($id)->customer->toArray();

        return view('backend.pages.bills.show', compact('billDetails', 'customer'));
    }
}
