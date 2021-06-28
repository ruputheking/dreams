<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Models\Course;
use App\Models\CourseComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Course $course, $comment = '')
    {
        return view('frontend.courses.course-show', compact('course', 'comment'));
    }

    public function store(Request $request)
    {
        $course = Course::find($request->course_id);
        $this->validate($request, [
            'course_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'comments' => 'required|string|max:525'
        ],[
            'notice_id.required' => 'Invalid Notice',
            'notice_id.numeric' => 'Invalid Notice'
        ]);

        $comment = new CourseComment;
        $comment->course_id = $request->course_id;
        $comment->name = $request->name;
        $comment->phone = $request->phone;
        $comment->email = $request->email;
        $comment->comments = $request->comments;
        $comment->save();

        return redirect()->route('course.show', $course->slug)->with('success', 'Successfully Commented');
    }

    public function reply(Request $request)
    {
        $course = Course::find($request->course_id);
        $this->validate($request, [
            'course_id' => 'required|numeric',
            'comment_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'comments' => 'required|string|max:525'
        ],[
            'course_id.required' => 'Invalid Notice',
            'course_id.numeric' => 'Invalid Notice',
            'comment_id.required' => 'Invalid Reply',
            'comment_id.numeric' => 'Invalid Reply'
        ]);

        $comment = new CourseComment;
        $comment->course_id = $request->course_id;
        $comment->comment_id = $request->comment_id;
        $comment->name = $request->name;
        $comment->phone = $request->phone;
        $comment->email = $request->email;
        $comment->comments = $request->comments;
        $comment->save();

        return redirect()->route('course.show', $course->slug)->with('success', 'Successfully Commented');
    }
}
