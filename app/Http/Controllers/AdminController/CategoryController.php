<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Category;
use Config;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.pages.products.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        //
        // $file = $request->file('image');
        // $fileName = $request->file('image')->getClientOriginalName();
        // $user->image = $fileName;
        // $file->move('storage/image',$fileName);
        $data = new Category;
        $data->name = ucwords($request->name);
        $data->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        Category::find($id)->update(
            [
                'name' => ucwords($request->name)
            ]
        );

        return redirect()->back();
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
