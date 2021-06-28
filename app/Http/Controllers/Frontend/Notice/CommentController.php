<?php

namespace App\Http\Controllers\Frontend\Notice;

use App\Models\Notice;
use App\Models\NoticeComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Notice $notice,$comment='')
    {
        return view('frontend.notices.page-notice-show', compact('notice', 'comment'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'notice_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'comments' => 'required|string|max:525'
        ],[
            'notice_id.required' => 'Invalid Notice',
            'notice_id.numeric' => 'Invalid Notice'
        ]);

        $notice = Notice::find($request->notice_id);
        $comment = new NoticeComment;
        $comment->notice_id = $request->notice_id;
        $comment->name = $request->name;
        $comment->phone = $request->phone;
        $comment->email = $request->email;
        $comment->comments = $request->comments;
        $comment->save();

        return redirect()->route('notice.show', $notice->slug)->with('success', 'Successfully Commented');
    }

    public function reply(Request $request)
    {
        $notice = Notice::find($request->notice_id);
        $this->validate($request, [
            'notice_id' => 'required|numeric',
            'notice_comment_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'comments' => 'required|string|max:525'
        ],[
            'notice_id.required' => 'Invalid Notice',
            'notice_id.numeric' => 'Invalid Notice',
            'notice_comment_id.required' => 'Invalid Reply',
            'notice_comment_id.numeric' => 'Invalid Reply'
        ]);

        $comment = new NoticeComment;
        $comment->notice_id = $request->notice_id;
        $comment->notice_comment_id = $request->notice_comment_id;
        $comment->name = $request->name;
        $comment->phone = $request->phone;
        $comment->email = $request->email;
        $comment->comments = $request->comments;
        $comment->save();

        return redirect()->route('notice.show', $notice->slug)->with('success', 'Successfully Commented');
    }
}
