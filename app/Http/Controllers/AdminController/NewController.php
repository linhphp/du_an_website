<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\New_category;
use App\Kind_of_new;
use App\News;
use Config;

class NewController extends Controller
{
    public function index()
    {
        $newCategories = New_category::paginate(Config::get('paginate.pro'));
        return view('backend.pages.news_categories.create',compact('newCategories'));
    }
    public function store(Request $request)
    {
        New_category::create(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        New_category::find($id)->update(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }
    public function destroy($id)
    {
        New_category::find($id)->delete();    
        return redirect()->back();
    }
    
}
