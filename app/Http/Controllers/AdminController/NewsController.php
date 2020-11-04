<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use App\Models\KindOfNews;
use App\Models\News;
use Session;
use Config;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::join('kind_of_news', 'kind_of_news.id', '=', 'news.kind_of_news_id')
            ->join('news_categories', 'news_categories.id', '=', 'news.new_categories_id')
            ->select('news.*', 'kind_of_news.name as kind_name', 'news_categories.name as cate_name')
            ->orderDesc()->paginate(Config::get('paginate.pro'));
        
        return view('backend.pages.news.index', compact('news'));   
    }
    
    public function create()
    {
        $newCategorys =  NewsCategory::all()->pluck('id', 'name');
        $kindOfNews =  KindOfNews::all()->pluck('id', 'name');   
        
        return view('backend.pages.news.create', compact('newCategorys', 'kindOfNews'));
    } 

    public function store(Request $request)
    {
        
        $news = new news;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title,'-');
        $news->description = $request->description; 
        $news->content = $request->content;
        $news->kind_of_news_id = $request->kind_of_news_id;
        $news->new_categories_id = $request->new_categories_id;
        $news->post_image = $request->post_image;
        $news->save();

       $post_image = $request->post_image;
        if($post_image){
            $post_image_name = $post_image->getClientOriginalName();
            $name_image = current(explode('.', $post_image_name));
            $new_image = $name_image.rand(0,99).'.'.$post_image->getClientOriginalExtension();
            $post_image ->move('storage/image', $new_image);
            $news->post_image = $new_image;
        }
        $news->save();
        $post_image == '';

        return redirect()->route('news.index')->with(['newsSuccess' => '']);    
    }

    public function edit($id)
    {
        $newCategorys =  NewsCategory::all();
        $kindOfNews =  KindOfNews::all(); 
        $news = News::find($id);
      
        return view('backend.pages.news.edit', compact('newCategorys', 'kindOfNews', 'news'));  
    }

    public function update(Request $request, $id)
    {
        
        $file = $request->file('post_image');
        $fileName = $file->getClientOriginalName('post_image');
        $file->move('storage/image',$fileName);
        $news = $request->all();
        $news['post_image'] = $fileName;
        News::find($id)->update($news);
        
        return redirect()->back()->with('thongbao', 'Sữa bài viết thành công');
    }

    public function destroy($id)
    {
        if ($news = News::find($id)) {
            $news->delete();
        }

        return redirect()->back();
    }
    
}
