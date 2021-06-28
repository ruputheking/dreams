<?php

namespace App\Http\Controllers\Backend\Application;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::orderBy('id', 'desc')->get();
        return view('backend.applications.application-index', compact('applications'));
    }

    public function show(Request $request, Application $application)
    {
        if (!$request->ajax()) {
            return view('backend.applications.application-show', compact('application'));
        }
        else {
            return view('backend.applications.modal.application-show', compact('application'));
        }
    }

    public function update(Request $request, Application $application)
    {
        $application->status = $request->status;
        $application->update();

        return redirect()->route('application_requests.index')->with('success', 'Information has been updated');
    }
}
