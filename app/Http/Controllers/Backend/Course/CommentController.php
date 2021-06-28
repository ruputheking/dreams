<?php

namespace App\Http\Controllers\Backend\Course;

use App\Models\CourseComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = CourseComment::orderBy('id', 'desc')->whereNull('comment_id')->get();
        return view('backend.courses.comments.comment-index', compact('comments'));
    }

    public function show($id)
    {
        $comment = CourseComment::find($id);
        $comment->status = 1;
        $comment->update();
        
        return view('backend.courses.comments.comment-show', compact('comment'));
    }

    public function destroy($id)
    {
        CourseComment::find($id)->delete();
        return redirect()->route('coursecomments.index')->with('success', 'Information has been deleted');
    }
}
