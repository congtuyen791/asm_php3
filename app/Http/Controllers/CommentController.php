<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::select('id', 'content', 'user_id', 'product_id')->orderBy('id', 'desc')->with('user')->with('product')->paginate(10);
        return view('admin.comment.list', ['comment_list' => $comment]);
    }
    public function delete(Comment $id)
    {
        if ($id->delete()) {
            return redirect()->back();
        }
    }
}
