<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Brand;
use Config;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(Config::get('paginate.pro'));
        return view('backend.pages.brand.index', compact('brands'));
    }
    public function store(Request $request)
    {
        Brand::create(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        Brand::find($id)->update(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
