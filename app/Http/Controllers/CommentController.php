<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\Product;
use App\Models\News;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller
{

    public function storeProduct(CommentRequest $request, $id)
    {
        $product = Product::find($id);
        // return $request->product_id;
        $data = new Comment;
        $data->user_name = $request->name;
        $data->parent_id = $product->id;
        $data->state = 1;
        $data->content = $request->message;
        $data->save();
        $comment = Comment::where('id', $data->id)
            ->select('user_name', 'created_at', 'content')->first();
        return json_encode($comment);
    }

    public function storePost(CommentRequest $request, $id)
        {
            $news = News::find($id);
            $data = new Comment;
            $data->user_name = $request->name;
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
