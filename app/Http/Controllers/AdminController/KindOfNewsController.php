<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\NewsCategory;
use App\Models\KindOfNews;
use Config;

class KindOfNewsController extends Controller
{
    public function index()
    {
        $newsCategories = NewsCategory::all()->pluck('id', 'name');
        $kindOfNews = KindOfNews::join('news_categories', 'news_categories.id','=', 'kind_of_news.news_category_id')
            ->select('kind_of_news.*', 'news_categories.name as cate_name', 'news_categories.id as cate_id')
            ->get();

        return view('backend.pages.posts.typeNews', compact('kindOfNews', 'newsCategories'));    
    }

    public function store(Request $request)
    {
        $kindOfNews = New KindOfNews;
        $kindOfNews ->name = $request->name;
        $kindOfNews ->news_category_id = $request->news_category_id;
        $kindOfNews ->save();
        
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        KindOfNews::find($id)->update(
            [
                'name' => $request->name,
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
        if ($data['action']== "new_categories") {
            $kind_of_news = KindOfNews::where('new_categories_id',$data['new_categories_id'])->get();
                $output.=' <option>--Chọn loại tin--</option>';

            foreach($kind_of_news as $kind_of_new){
                $output.= '<option value="' . $kind_of_new->id . '">' . $kind_of_new->name . '</option>';
            }         
        }  
    }
}

