<?php

namespace App\Http\Controllers\Backend\Course;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        return view('backend.courses.courses.course-index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::orderBy('id', 'desc')->get();
        return view('backend.courses.courses.course-add', compact('categories'));
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
            'slug' => 'required|unique:courses',
            'summary' => 'required|string',
            'category_id' => 'required',
            'price' => 'nullable|numeric',
            'description' => 'required',
            'starting_date' => 'nullable',
            'starting_time' => 'nullable',
            'ending_time' => 'nullable',
            'schedule' => 'nullable',
            'duration' => 'nullable',
            'total_credit' => 'nullable|numeric',
            'max_student' => 'nullable|numeric',
            'feature_image' => 'required|image',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
        ]);

        $course = new Course;
        $course->title = $request->title;
        $course->slug = $request->slug;
        $course->summary = $request->summary;
        $course->category_id = $request->category_id;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->starting_date = $request->starting_date;
        $course->schedule = $request->schedule;
        $course->starting_time = $request->starting_time;
        $course->ending_time = $request->ending_time;
        $course->duration = $request->duration;
        $course->total_credit = $request->total_credit;
        $course->max_student = $request->max_student;
        $course->seo_meta_keywords = $request->seo_meta_keywords;
        $course->seo_meta_description = $request->seo_meta_description;
        $course->status = $request->status;
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/courses/', $fileName);
            $course->feature_image = 'courses/' . $fileName;
        }
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('backend.courses.courses.course-show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = CourseCategory::orderBy('id', 'desc')->get();
        return view('backend.courses.courses.course-edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'slug' => ['required', Rule::unique('courses')->ignore($course->id)],
            'summary' => 'required|string',
            'category_id' => 'required',
            'price' => 'nullable|numeric',
            'description' => 'required',
            'starting_date' => 'nullable',
            'starting_time' => 'nullable',
            'ending_time' => 'nullable',
            'schedule' => 'nullable',
            'duration' => 'nullable',
            'total_credit' => 'nullable|numeric',
            'max_student' => 'nullable|numeric',
            'feature_image' => 'nullable|image',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
        ]);

        $course->title = $request->title;
        $course->slug = $request->slug;
        $course->summary = $request->summary;
        $course->category_id = $request->category_id;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->starting_date = $request->starting_date;
        $course->schedule = $request->schedule;
        $course->starting_time = $request->starting_time;
        $course->ending_time = $request->ending_time;
        $course->duration = $request->duration;
        $course->total_credit = $request->total_credit;
        $course->max_student = $request->max_student;
        $course->seo_meta_keywords = $request->seo_meta_keywords;
        $course->seo_meta_description = $request->seo_meta_description;
        $course->status = $request->status;
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/courses/', $fileName);
            $course->feature_image = 'courses/' . $fileName;
        }
        $course->update();

        return redirect()->route('courses.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('courses.index')->with('success', 'Information has been deleted');
    }
}
