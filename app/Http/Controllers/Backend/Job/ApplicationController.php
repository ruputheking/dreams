<?php

namespace App\Http\Controllers\Backend\Job;

use App\Models\JobCandidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = JobCandidate::orderBy('id', 'desc')->get();
        return view('backend.jobs.applications.application-index', compact('applications'));
    }

    public function show($id)
    {
        $candidate = JobCandidate::find($id);
        return view('backend.jobs.applications.application-view', compact('candidate'));
    }

    public function destroy($id)
    {
        JobCandidate::find($id)->delete();
        return redirect()->route('jobappications.index')->with('success', 'Information has been deleted.');
    }
}
