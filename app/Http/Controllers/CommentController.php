<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\News;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller
{

    public function storeProduct(Request $request, $id)
    {
        $product = Product::find($id);
        // return $request->product_id;
        $data = new Comment;
        $data->user_name = $request->name;
        $data->parent_id = $product->id;
        $data->state = 1;
        $data->content = $request->message;
        $data->save();

        return 'successfully';
    }

    public function storePost(Request $request, $id)
        {
            $news = News::find($id);
            $data = new Comment;
            $data->user_name = $request->user_name;
            $data->parent_id = $news->id;
            $data->state = 2;
            $data->content = $request->message;
            $data->save();

            return 'successfully';
        }

    public function addChildenComment(Request $request, $id)
    {
        $comment = Comment::find($id);
        if($comment) {
            Comment::create(
                [
                    'product_id' => $comment->product_id,
                    'user_id' => Auth::id(),
                    'parent_id' => $comment->id,
                    'content' => $request->content
                ]);

            return redirect()->back();
        }
    }
    
}
