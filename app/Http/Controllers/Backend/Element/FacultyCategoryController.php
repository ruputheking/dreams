<?php

namespace App\Http\Controllers\Backend\Element;

use App\Models\FacultyMember;
use App\Models\FacultyCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class FacultyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FacultyCategory::orderBy('id', 'desc')->get();
        return view('backend.faculties.categories.category-index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'slug' => 'required|string|unique:faculty_categories'
        ]);

        $category = new FacultyCategory;
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('team_categories.index')->with('success', 'Information has been added');
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
    public function edit(FacultyCategory $category)
    {
        $categories = FacultyCategory::orderBy('id', 'desc')->get();
        return view('backend.faculties.categories.category-edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacultyCategory $category)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'slug' => ['required', Rule::unique('faculty_categories')->ignore($category->id)]
        ]);

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->update();

        return redirect()->route('team_categories.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacultyCategory $category)
    {
        if ($category->id == 1) {
            return redirect()->route('team_categories.index')->with('error', 'Default Category cannot be deleted');
        }
        FacultyMember::where('position_id', $category->id)->update(['position_id' => 1]);
        $category->delete();
        return redirect()->route('team_categories.index')->with('success', 'Information has been deleted');
    }
}
