<?php

namespace App\Http\Controllers\Backend\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
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
        $categories = CourseCategory::orderBy('id', 'desc')->get();
        return view('backend.courses.categories.category-index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required|string',
            'slug' => 'required|unique:course_categories'
        ]);

        $category = new CourseCategory;
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('coursecategories.index')->with('success', 'Information has been added');
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
    public function edit(CourseCategory $category)
    {
        return view('backend.courses.categories.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCategory $category)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'slug' => ['required', Rule::unique('course_categories')->ignore($category->id)]
        ]);

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->update();

        return redirect()->route('coursecategories.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseCategory $category)
    {
        if ($category->id == 1) {
            return redirect()->route('coursecategories.index')->with('error', "You cannot delete default category");
        }
        Course::where('category_id', $category->id)->update('courses.category_id', 1);
        $category->delete();

        return redirect()->route('coursecategories.index')->with('success', 'Information has been deleted');
    }
}
