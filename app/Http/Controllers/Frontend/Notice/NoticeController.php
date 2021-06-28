<?php

namespace App\Http\Controllers\Frontend\Notice;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::select('notices.*', 'notices.id as id')
                            ->join('user_notices', 'user_notices.notice_id', '=', 'notices.id')
                            ->with('comments')
                            ->where('user_notices.user_type', 'Website')->orderBy('notices.id', 'desc')->simplePaginate(5);
        return view("frontend.notices.page-notice", compact('notices'));
    }

    public function show(Notice $notice)
    {
        $notice->increment('view_count');
        $noticeComments = $notice->comments()->simplePaginate(3);
        return view('frontend.notices.page-notice-show', compact('notice', 'noticeComments'));
    }
}
