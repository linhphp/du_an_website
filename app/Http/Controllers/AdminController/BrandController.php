<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Brand;
use Config;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('backend.pages.products.brands', compact('brands'));
    }
    public function store(Request $request)
    {
        Brand::create(
            [
                'name' => ucwords($request->name)
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        Brand::find($id)->update(
            [
                'name' => ucwords($request->name)
            ]
        );

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
        Brand::find($id)->delete();

        return redirect()->back();
    }
}
