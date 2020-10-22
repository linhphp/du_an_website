<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Emage;
use Config;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('categories','categories.id', '=', 'products.category_id')
            ->select('products.*', 'brands.name as brand_name', 'categories.name as cate_name')
            ->orderDesc()->paginate(Config::get('paginate.pro'));

        return view('backend.pages.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'name');
        return view('backend.pages.products.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName('image');
        $file->move('storage/image',$fileName);
        $product = new Product;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->image = $fileName;
        $product->accessories = $request->accessories;
        $product->desc = $request->desc;
        $product->content = $request->content;
        $product->quantity = 1;
        $product->save();
        foreach($request->imageDetails as $img)
        {
            $fileNameImage = $img->getClientOriginalName($img);
            $img->move('storage/image', $fileNameImage);
            Emage::create(
                [
                    'product_id' => $product->id,
                    'emagery' => $fileNameImage
                ]
            );
        }

        return redirect()->route('products.index');    
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);
        return view('backend.pages.products.edit', compact('brands', 'categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName('image');
        $file->move('storage/image',$fileName);
        $product = $request->all();
        $product['quantity'] = 1;
        $product['image'] = $fileName;
        Product::find($id)->update($product);
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
        Product::destroy($id);
        return redirect()->back();
    }
}
