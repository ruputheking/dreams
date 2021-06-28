<?php

namespace App\Http\Controllers\Frontend\Admission;

use App\Models\User;
use App\Models\Course;
use App\Models\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseApplication;
use App\Http\Controllers\Controller;

class AdmissionController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.admissions.admission-form', compact('courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'qualification' => 'required|string',
            'photo' => 'required|image',
            'attachment' => 'required|image',
            'course_id' => 'required'
        ]);
        $course = Course::find($request->course_id);
        $student = new CourseApplication;
        $student->name = $request->first_name . ' ' . $request->last_name;
        $student->course_id = $request->course_id;
        $student->gender = $request->gender;
        $student->birthday = $request->birthday;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->qualification = $request->qualification;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/applications/students/photo', $fileName);
            $student->photo = 'applications/students/photo/' . $fileName;
        }
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/applications/students/cv/', $fileName);
            $student->attachment = 'applications/students/cv/' . $fileName;
        }
        $student->save();

        $users = User::select('*','users.id AS id')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.role_id', 1)->get();
        foreach ($users as $data) {
            $notification = new Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have one request For ' . $course->title . '.';
            $notification->message = $student->name . "has been sent you a request for " . $course->title . '.';
            $notification->address = route('courseappications.index');
            $notification->save();
        }

        return redirect()->route('pages.home')->with('success', 'Successfully Applied');
    }
}
