<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\NewsCategory;
use App\Models\KindOfNews;
use App\Models\News;
use Config;

class KindOfNewsController extends Controller
{
    public function index()
    {
       $newsCategories = NewsCategory::all(); 
       $kindOfNews = KindOfNews::join('news_categories', 'news_categories.id','=', 'kind_of_news.new_categories_id')
            ->select('kind_of_news.*', 'news_categories.name as cate_name')
            ->paginate(Config::get('paginate.pro'));
        return view('backend.pages.kind-of-news.create', compact('kindOfNews', 'newsCategories'));    
    }
    public function create()
    {
        $newCategories = NewsCategory::all()->pluck('id', 'name');
        return view('backend.pages.kind-of-news.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $kindOfNews = New KindOfNews;
        $kindOfNews -> name = $request->name;
        $kindOfNews -> new_categories_id = $request->new_categories_id;
        $kindOfNews -> save();
        
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        KindOfNews::find($id)->update(
            [
                'name' => $request->name,
                'status' => rand(1, 2)
            ]
        );

        return redirect()->back();
    }
    public function destroy($id)
    {
        KindOfNews::find($id)->delete(); 
        return redirect()->back();
    }
    public function ajax_add(request $request)
    {   
        $data = $request->all();
        $output = '';
        if($data['action']== "new_categories"){
            $kind_of_news = KindOfNews::where('new_categories_id',$data['new_categories_id'])->get();
                $output.=' <option>--Chọn loại tin--</option>';
            foreach($kind_of_news as $kind_of_new){
                $output.= '<option value="'.$kind_of_new->id.'">'.$kind_of_new->name.'</option>';
            }         
        }  
    }
}
