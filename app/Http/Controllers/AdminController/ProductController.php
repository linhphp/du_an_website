<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use Config;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('categories','categories.id', '=', 'products.category_id')
            ->select('products.*', 'brands.name as brand_name', 'categories.name as cate_name')
            ->orderDesc()->get();

        return view('backend.pages.products.product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'name');
        return view('backend.pages.products.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $file1 = $request->file('image1');
        $fileName1 = $file1->getClientOriginalName('image1');
        $file1->move('storage/image',$fileName1);
        $file2 = $request->file('image2');
        $fileName2 = $file2->getClientOriginalName('image2');
        $file2->move('storage/image',$fileName2);
        
        $product = new Product;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->image1 = $fileName1;
        $product->image2 = $fileName2;
        $product->accessories = $request->accessories;
        $product->desc = $request->desc;
        $product->quantity = 1;
        $product->save();

        return redirect()->route('products.index');    
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $brands = Brand::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'name');
        $product = Product::find($id);
        return view('backend.pages.products.product.edit', compact('brands', 'categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        $file1 = $request->file('image1');
        if ($file1) {
            $fileName1 = $file1->getClientOriginalName('image1');
            $file1->move('storage/image',$fileName1);
        }
        $file2 = $request->file('image2');
        if ($file2) {
            $fileName2 = $file2->getClientOriginalName('image2');
            $file2->move('storage/image',$fileName2);
        }
        $product = Product::find($id);
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        if ($file1) {
            $product->image1 = $fileName1;
        }
        if ($file2) {
            $product->image2 = $fileName2;
        }
        $product->accessories = $request->accessories;
        $product->desc = $request->desc;
        $product->quantity = 1;
        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        //
        Product::destroy($id);
        return redirect()->back();
    }
}
