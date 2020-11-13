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
        $getNews = News::join('kind_of_news', 'kind_of_news.id', '=', 'news.kind_of_news_id')
            ->join('news_categories', 'news_categories.id', '=', 'news.news_category_id')
            ->select('news.*', 'kind_of_news.name as kind_name', 'news_categories.name as cate_name')
            ->orderDesc()->get();
        
        return view('backend.pages.posts.news.index', compact('getNews'));   
    }
    public function create()
    {
        $newsCategories =  NewsCategory::all()->pluck('id', 'name');
        $kindOfNews =  KindOfNews::all()->pluck('id', 'name');   
        
        return view('backend.pages.posts.news.create', compact('newsCategories', 'kindOfNews'));
    } 

    public function store(Request $request)
    {
        
        $news = new news;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title,'-');
        $news->description = $request->description; 
        $news->content = $request->content;
        $news->kind_of_news_id = $request->kind_of_news_id;
        $news->news_category_id = $request->news_category_id;
        $news->post_image = $request->post_image;
        $news->date = date("D-M-Y");
        $news->save();

       $post_image = $request->post_image;
        if ($post_image) {
            $post_image_name = $post_image->getClientOriginalName();
            $name_image = current(explode('.', $post_image_name));
            $new_image = $name_image.rand(0,99).'.'.$post_image->getClientOriginalExtension();
            $post_image ->move('storage/image', $new_image);
            $news->post_image = $new_image;
        }
        $news->save();

        return redirect()->route('news.index')->with(['newsSuccess' => '']);    
    }

    public function edit($id)
    {
        $newsCategories =  NewsCategory::all()->pluck('id', 'name');
        $kindOfNews =  KindOfNews::all()->pluck('id', 'name'); 
        $news = News::find($id);
      
        return view('backend.pages.posts.news.edit', compact('newsCategories', 'kindOfNews', 'news'));  
    }

    public function update(Request $request, $id)
    {
        $getNews = News::find($id);
        $file = $request->file('post_image');
        $news = $request->all();
        if ($file) {
            $fileName = $file->getClientOriginalName('post_image');
            $file->move('storage/image',$fileName);
            $news['post_image'] = $fileName;
        }
        else {
            $news['post_image'] = $getNews->post_image;
        }
        $getNews->update($news);
        
        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        if ($news = News::find($id)) {
            $news->delete();
        }
        
        return redirect()->back();
    }
    
}
