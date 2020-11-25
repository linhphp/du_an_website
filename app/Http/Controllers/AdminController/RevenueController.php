<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Revenue;

class RevenueController extends Controller
{
    //
    public function index()
    {
    	$revenues = Revenue::join('products', 'products.id', '=', 'revenues.product_id')
    	    ->select('revenues.*', 'products.name')
    	    ->get();

    	return view('backend.pages.revenue.index', compact('revenues'));
    }
}
