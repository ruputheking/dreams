<?php

namespace App\Http\Controllers\Backend\Course;

use Illuminate\Http\Request;
use App\Models\CourseApplication;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = CourseApplication::orderBy('id', 'desc')->get();
        return view('backend.courses.applications.application-index', compact('applications'));
    }

    public function show($id)
    {
        $candidate = CourseApplication::find($id);
        return view('backend.courses.applications.application-view', compact('candidate'));
    }

    public function destroy($id)
    {
        CourseApplication::find($id)->delete();
        return redirect()->route('courseappications.index')->with('success', 'Information has been deleted.');
    }
}
