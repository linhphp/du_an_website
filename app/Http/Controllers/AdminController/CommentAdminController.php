<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentAdminController extends Controller
{
    public function commentsNews()
    {
        $comments = Comment::join('news', 'news.id', '=', 'comments.parent_id')
            ->select('news.title', 'comments.*')
            ->where('comments.state', 2)
            ->get();
            return view('backend.pages.comments.commentNews', compact('comments'));
    }

    public function commentsProduct()
    {
        $comments = Comment::join('products', 'products.id', '=', 'comments.parent_id')
            ->select('products.name', 'comments.*')
            ->where('comments.state', 1)
            ->get();
            return view('backend.pages.comments.commentProduct', compact('comments'));
    }

    public function destroy($id)
    {
        //
        Comment::find($id)->delete();

        return redirect()->back();
    }
}
