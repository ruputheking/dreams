<?php

namespace App\Http\Controllers\Frontend\News;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = Post::with('category', 'comments')->published()->latestFirst()->filter(request()->only(['term', 'year', 'month']))->simplePaginate(6);
        return view('frontend.news.news-list', compact('news'));
    }

    public function show(Post $news)
    {
        $news->increment('view_count');
        $postComments = $news->comments()->simplePaginate(3);
        return view('frontend.news.news-show', compact('news', 'postComments'));
    }

    public function category(Category $category)
    {
        $categoryName = $category->title;
        $news = $category->posts()->published()->with('comments', 'tags')->latestFirst()->filter(request()->only(['term', 'year', 'month']))->simplePaginate(6);
        return view('frontend.news.news-list', compact('news', 'categoryName'));
    }

    public function tags(Tag $tag)
    {
        $tagName = $tag->title;
        $news = $tag->posts()->with('category', 'comments')->latestFirst()->published()->simplePaginate(6);
         return view("frontend.news.news-list", compact('news', 'tagName'));
    }
}
