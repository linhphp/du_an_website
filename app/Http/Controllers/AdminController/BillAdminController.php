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
    	$bills = Bill::joinCustomer()
    	    ->orderBy('updated_at', 'desc')
    	    ->get();

    	return view('backend.pages.checkout.bills.billShow', compact('bills', 'status'));
    }

    public function billUpdate (Request $request)
    {
    	$bill = Bill::find($request->id);
    	$bill->status_id = $request->status;
    	$bill->save();
    }

    public function billDetail ($id)
    {
    	$billDetails = BillDetail::joinProduct()
    	    ->where('bill_details.bill_id', $id)
    	    ->get();
    	$customer = Bill::find($id)->customer->toArray();

        return view('backend.pages.checkout.bills.billDetail', compact('billDetails', 'customer'));
    }
}
