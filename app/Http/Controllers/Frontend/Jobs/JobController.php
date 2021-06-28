<?php

namespace App\Http\Controllers\Frontend\Jobs;

use App\Models\Job;
use App\Models\User;
use App\Models\JobCandidate;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('status', 1)->orderBy('id', 'desc')->simplePaginate(6);
        return view('frontend.jobs.job-index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('frontend.jobs.job-show', compact('job'));
    }

    public function create(Job $job)
    {
        return view('frontend.jobs.job-apply', compact('job'));
    }

    public function store(Request $request, Job $job)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'gender' => 'required|string',
            'birthday' => 'required',
            'message' => 'required|string',
            'attachment' => 'required|image|max:12288',
            'photo' => 'required|image|max:12288',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'previous_job' => 'required|string|max:255'
        ]);

        $application = new JobCandidate;
        $application->job_id = $job->id;
        $application->name = $request->name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->gender = $request->gender;
        $application->address = $request->address;
        $application->birthday = $request->birthday;
        $application->qualification = $request->qualification;
        $application->previous_job = $request->previous_job;
        $application->experience = $request->experience;
        $application->message = $request->message;
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/applications/jobs/attachment/', $fileName);
            $application->attachment = 'applications/jobs/attachment/'. $fileName;
        }
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/applications/jobs/photo/', $fileName);
            $application->photo = 'applications/jobs/photo/'. $fileName;
        }
        $application->save();

        $users = User::select('*','users.id AS id')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.role_id', 1)->get();
        foreach ($users as $data) {
            $notification = new Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have one request For ' . $job->title . '.';
            $notification->message = $application->name . "has been sent you a request for " . $job->title . '.';
            $notification->address = route('jobappications.index');
            $notification->save();
        }

        return redirect()->route('job.show', $job->slug)->with('success', 'We will contact you soon.');
    }
}
