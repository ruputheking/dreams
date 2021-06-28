<?php

namespace App\Http\Controllers\Frontend\News;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Post $news,$comment='')
    {
        return view('frontend.news.news-show', compact('news', 'comment'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:525'
        ],[
            'post_id.required' => 'Invalid News',
            'post_id.numeric' => 'Invalid News'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->name = $request->name;
        $comment->phone = $request->phone;
        $comment->email = $request->email;
        $comment->comments = $request->message;
        $comment->save();

        return redirect()->back()->with('success', 'Successfully Commented on News');
    }

    public function reply(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required|numeric',
            'comment_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:525'
        ],[
            'post_id.required' => 'Invalid News',
            'post_id.numeric' => 'Invalid News',
            'comment_id.required' => 'Invalid Reply',
            'comment_id.numeric' => 'Invalid Reply'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->comment_id = $request->comment_id;
        $comment->name = $request->name;
        $comment->phone = $request->phone;
        $comment->email = $request->email;
        $comment->comments = $request->message;
        $comment->save();

        return redirect()->back()->with('success', 'Successfully Commented on News');
    }
}
