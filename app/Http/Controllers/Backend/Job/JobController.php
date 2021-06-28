<?php

namespace App\Http\Controllers\Backend\Job;

use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->get();
        return view('backend.jobs.jobs.job-index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jobs.jobs.job-add');
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
            'slug' => 'required|unique:jobs',
            'summary' => 'required|string',
            'location' => 'required',
            'salary' => 'nullable',
            'details' => 'required',
            'deadline' => 'required',
            'candidate' => 'required|numeric',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
            'status' => 'required'
        ]);

        $job = new Job;
        $job->title = $request->title;
        $job->slug = $request->slug;
        $job->summary = $request->summary;
        $job->location = $request->location;
        $job->salary = $request->salary ?? 'Negotiable';
        $job->deadline = $request->deadline;
        $job->candidate = $request->candidate;
        $job->details = $request->details;
        $job->seo_meta_keywords = $request->seo_meta_keywords;
        $job->seo_meta_description = $request->seo_meta_description;
        $job->status = $request->status;
        $job->save();

        return redirect()->route('jobs.index')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('backend.jobs.jobs.job-show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('backend.jobs.jobs.job-edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'slug' => ['required', Rule::unique('jobs')->ignore($job->id)],
            'summary' => 'required|string',
            'location' => 'required',
            'salary' => 'nullable',
            'details' => 'required',
            'deadline' => 'required',
            'candidate' => 'required|numeric',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
            'status' => 'required'
        ]);

        $job->title = $request->title;
        $job->slug = $request->slug;
        $job->summary = $request->summary;
        $job->location = $request->location;
        $job->salary = $request->salary ?? 'Negotiable';
        $job->deadline = $request->deadline;
        $job->candidate = $request->candidate;
        $job->details = $request->details;
        $job->seo_meta_keywords = $request->seo_meta_keywords;
        $job->seo_meta_description = $request->seo_meta_description;
        $job->status = $request->status;
        $job->update();

        return redirect()->route('jobs.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Information has been deleted');
    }
}
