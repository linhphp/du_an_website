<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\NewCategory;
use App\Models\KindOfNew;
use App\Models\News;
use Config;

class NewCategoryController extends Controller
{
    public function index()
    {
        $newCategories = NewCategory::paginate(Config::get('paginate.pro'));
        return view('backend.pages.news_categories.create',compact('newCategories'));    
    }
    public function store(Request $request)
    {
        NewCategory::create(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );
        
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        NewCategory::find($id)->update(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }
    public function destroy($id)
    {
        NewCategory::find($id)->delete(); 
        return redirect()->back();
    }
    
}
