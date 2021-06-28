<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('comments')->where('status', 1)->orderBy('id', 'desc')->simplePaginate(6);
        return view('frontend.courses.course-index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('frontend.courses.course-show', compact('course'));
    }

    public function category(CourseCategory $category)
    {
        $categoryName = $category->title;
        $courses = $category->courses()->with('comments')->where('status', 1)->orderBy('id', 'desc')->simplePaginate(6);
        return view('frontend.courses.course-index', compact('courses', 'categoryName'));
    }
}
