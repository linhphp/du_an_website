<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Config;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $newsCategories = NewsCategory::all();

        return view('backend.pages.posts.newsCategories', compact('newsCategories'));
    }

    public function store(Request $request)
    {
        NewsCategory::create(
            [
                'name' => $request->name
            ]
        );

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        NewsCategory::find($id)->update(
            [
                'name' => $request->name
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
