<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Config;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $newCategories = NewsCategory::paginate(Config::get('paginate.pro'));

        return view('backend.pages.news_categories.create', compact('newCategories'));
    }

    public function store(Request $request)
    {
        NewsCategory::create(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        NewsCategory::find($id)->update(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }

    public function destroy($id)
    {
        NewsCategory::find($id)->delete();

        return redirect()->back();
    }

}
