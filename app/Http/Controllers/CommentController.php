<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller
{
    public function __construct ()
    {
        $this->middleware('checkout');
    }

    public function store(Request $request, $id)
    {
        $product = Product::find($id);
        if($product) {
            Comment::create(
                [
                    'product_id' => $product->id,
                    'user_id' => Auth::id(),
                    'content' => $request->content
                ]);

            return redirect()->back();
        }
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
