<?php

namespace App\Http\Controllers\Backend\Blog;

use Auth;
use App\Models\Post;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;
        if (($status = $request->get('status')) && $status == 'trash')
        {
            $posts       = Post::onlyTrashed()->with('category', 'author')->latest()->get();
            $postCount   = Post::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        elseif ($status == 'published')
        {
            $posts       = Post::published()->with('category', 'author')->latest()->get();
            $postCount   = Post::published()->count();
        }
        elseif ($status == 'scheduled')
        {
            $posts       = Post::scheduled()->with('category', 'author')->latest()->get();
            $postCount   = Post::scheduled()->count();
        }
        elseif ($status == 'draft')
        {
            $posts       = Post::draft()->with('category', 'author')->latest()->get();
            $postCount   = Post::draft()->count();
        }
        elseif ($status == 'own')
        {
            $posts       = $request->user()->posts()->with('category', 'author')->latest()->get();
            $postCount   = $request->user()->posts()->count();
        }
        else
        {
            $posts = Post::with('category', 'author')->latest()->get();
            $postCount   = Post::count();
        }

        $statusList = $this->statusList($request);
        return view('backend.blogs.blogs.blog-list', compact('posts', 'postCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
          'own' => $request->user()->posts()->count(),
          'all' => Post::count(),
          'published' => Post::published()->count(),
          'scheduled' => Post::scheduled()->count(),
          'draft' => Post::draft()->count(),
          'trash' => Post::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $categories = \App\Models\Category::orderBy('id', 'desc')->get();
        return view('backend.blogs.blogs.blog-add', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|string',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|numeric',
            'summary' => 'required|string|max:1000',
            'description' => 'required|string',
            'feature_image' => 'required|image',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
            'published_at' => 'nullable'
        ],[
            'category_id.required' => 'The Category Field is required',
            'category_id.numeric' => 'The Category Field is required'
        ]);

        $post = new Post;
        $post->author_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->summary = $request->summary;
        $post->description = $request->description;
        $post->published_at = $request->published_at;
        $post->seo_meta_keywords = $request->seo_meta_keywords;
        $post->seo_meta_description = $request->seo_meta_description;
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/blogs/', $fileName);
            $post->feature_image = 'blogs/' . $fileName;
        }
        $post->save();

        return redirect()->route('news.index')->with('success', 'Your post has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = \App\Models\Category::orderBy('id', 'desc')->get();
        return view('backend.blogs.blogs.blog-edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255|string',
            'slug' => ['required', Rule::unique('posts')->ignore($post->id)],
            'category_id' => 'required|numeric',
            'summary' => 'required|string|max:1000',
            'description' => 'required|string',
            'feature_image' => 'nullable|image',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
            'published_at' => 'nullable'
        ],[
            'category_id.required' => 'The Category Field is required',
            'category_id.numeric' => 'The Category Field is required'
        ]);

        $post->author_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->summary = $request->summary;
        $post->description = $request->description;
        $post->published_at = $request->published_at;
        $post->seo_meta_keywords = $request->seo_meta_keywords;
        $post->seo_meta_description = $request->seo_meta_description;
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/blogs/', $fileName);
            $post->feature_image = 'blogs/' . $fileName;
        }
        $post->update();

        return redirect()->route('news.index')->with('success', 'Your post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('news.index')->with('trash-message', ['Your post has been deleted successfully!', $post->slug]);
    }

    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect('dashboard/news?status=trash')->with('success', 'Your post has been deleted permanntly successfully!');
    }

    public function restore($id)
    {
        $post1 = Post::onlyTrashed()->findOrFail($id);
        $post1->restore();

        return redirect('dashboard/news?status=trash')->with('success', "Your post has been moved from trash");
    }
}
