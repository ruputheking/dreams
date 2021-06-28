<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('posts')->orderBy('id', 'desc')->get();

        return view("backend.blogs.categories.category-add", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title' => 'required|unique:categories|max:255',
          'slug' => 'required|unique:categories|max:255',
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('categories.index')->with("success", 'New Category has been created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::with('posts')->orderBy('id', 'desc')->get();
        return view("backend.blogs.categories.category-edit", compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'slug' => ['required', Rule::unique('categories')->ignore($category->id)],
        ]);

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->update();

        return redirect()->route('categories.index')->with("success", 'Category was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, Category $category)
     {
         if ($category->id == 1) {
             return redirect()->back()->with('error', "You don't have permission to delete default category!");
         }

         Post::withTrashed()->where('category_id', $category->id)->update(['category_id' => 1]);

         $category->delete();

         return redirect()->route('categories.index')->with('success', 'Category has been deleted successfully!');
     }
}
