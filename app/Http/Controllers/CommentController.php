<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller
{

    public function store(Request $request, $id)
    {
        $product = Product::find($id);
        // return $request->product_id;
        $data = new Comment;
        $data->user_name = $request->name;
        $data->product_id = $product->id;
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
