<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\NewCategory;
use App\Models\KindOfNew;
use App\Models\News;
use Config;

class KindOfNewController extends Controller
{
    public function index()
    {
        $newCategories = NewCategory::paginate(Config::get('paginate.pro'));
        $kindOfNews = KindOfNew::paginate(Config::get('paginate.pro'));
        return view('backend.pages.kind-of-news.create',compact('kindOfNews','newCategories'));    
    }
    public function create()
    {
        $newCategories = NewCategory::all()->pluck('id', 'name');
        return view('backend.pages.kind-of-news.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $kindOfNews = New KindOfNew;
        $kindOfNews ->name = $request->name;
        $kindOfNews ->new_categories_id = $request->new_categories_id;
        $kindOfNews ->save();
        
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        KindOfNew::find($id)->update(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }
    public function destroy($id)
    {
        KindOfNew::find($id)->delete(); 
        return redirect()->back();
    }
    
}
