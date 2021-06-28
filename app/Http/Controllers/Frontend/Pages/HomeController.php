<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Models\Job;
use App\Models\Post;
use App\Models\Event;
use App\Models\Notice;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // dd(request()->toArray());
        if (request()->category == 'news') {
            $news = Post::with('category', 'comments')->published()->latestFirst()->filter(request()->only(['term']))->simplePaginate(6);
            return view('frontend.news.news-list', compact('news'));
        }
        if (request()->category == 'notice') {
            $notices = Notice::select('notices.*', 'notices.id as id')
                                ->join('user_notices', 'user_notices.notice_id', '=', 'notices.id')
                                ->with('comments')->filter(request()->only(['term']))
                                ->where('user_notices.user_type', 'Website')->orderBy('notices.id', 'desc')->simplePaginate(5);

            return view("frontend.notices.page-notice", compact('notices'));
        }
        if (request()->category == 'jobs') {
            $jobs = Job::where('status', 1)->filter(request()->only(['term']))->orderBy('id', 'desc')->simplePaginate(6);
            return view('frontend.jobs.job-index', compact('jobs'));
        }
        if (request()->category == 'event') {
            $events = Event::where('status', 0)->filter(request()->only(['term']))->orderBy('id', 'desc')->simplePaginate(4);
            return view('frontend.events.event-list', compact('events'));
        }
        if (request()->category == 'course') {
            $courses = Course::with('comments')->where('status', 1)->filter(request()->only(['term']))->orderBy('id', 'desc')->simplePaginate(6);
            return view('frontend.courses.course-index', compact('courses'));
        }
        if (request()->category == 'all') {
            $news = Post::with('category', 'comments')->published()->latestFirst()->filter(request()->only(['term']))->simplePaginate(6);
            $notices = Notice::select('notices.*', 'notices.id as id')
                                ->join('user_notices', 'user_notices.notice_id', '=', 'notices.id')
                                ->with('comments')->filter(request()->only(['term']))
                                ->where('user_notices.user_type', 'Website')->orderBy('notices.id', 'desc')->simplePaginate(5);
            $jobs = Job::where('status', 1)->filter(request()->only(['term']))->orderBy('id', 'desc')->simplePaginate(6);
            $events = Event::where('status', 0)->filter(request()->only(['term']))->orderBy('id', 'desc')->simplePaginate(4);
            $courses = Course::with('comments')->where('status', 1)->filter(request()->only(['term']))->orderBy('id', 'desc')->simplePaginate(6);

            return view('frontend.pages.page-search', compact('news', 'notices', 'jobs', 'events', 'courses'));
        }
        return view('frontend.home.page-home');
    }
}
