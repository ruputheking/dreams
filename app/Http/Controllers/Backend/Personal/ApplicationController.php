<?php

namespace App\Http\Controllers\Backend\Personal;

use Auth;
use App\Models\User;
use App\Models\Application;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function leave_application_index()
    {
        $applications = Application::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('backend.private.applications.application-index', compact('applications'));
    }

    public function leave_application_create(Request $request)
    {
        if (! $request->ajax()) {
            return view('backend.private.applications.application-create');
        }else {
            return view('backend.private.applications.modal.application-create');
        }
    }

    public function leave_application_store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|string',
            'reason' => 'required|string',
            'document' => 'nullable',
            'starting_date' => 'required',
            'ending_date' => 'required'
        ]);

        $application = new Application;
        $application->user_id = Auth::user()->id;
        $application->subject = $request->subject;
        $application->starting_date = $request->starting_date;
        $application->ending_date = $request->ending_date;
        $application->reason = $request->reason;
        $application->slug = Str::uuid();
        if ($request->hasFile('document')) {
            $image = $request->file('document');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/applications/', $fileName);
            $application->document = $fileName;
        }
        $application->save();

        $users = User::select('*','users.id AS id')
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->orWhere('role_user.role_id', 1)
                        ->orWhere('role_user.role_id', 5)
                        ->get();
                        
        foreach ($users as $data) {
            $notification = new Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have one request For Leave Application.';
            $notification->message = Auth::user()->user_name . "has been apply for leave.";
            $notification->address = route('application_requests.index');
            $notification->save();
        }

        return redirect()->route('applications.index')->with('success', 'Successfully Apply For Leave');
    }

    public function leave_application_edit(Request $request, Application $application)
    {
        if (! $request->ajax()) {
            return view('backend.private.applications.application-edit', compact('application'));
        }else {
            return view('backend.private.applications.modal.application-edit', compact('application'));
        }
    }

    public function leave_application_update(Request $request, Application $application)
    {
        $this->validate($request, [
        'subject' => 'required|string',
        'reason' => 'required|string',
        'document' => 'nullable',
        'starting_date' => 'required',
        'ending_date' => 'required'
        ]);

        $application->subject = $request->subject;
        $application->starting_date = $request->starting_date;
        $application->ending_date = $request->ending_date;
        $application->reason = $request->reason;
        if ($request->hasFile('document')) {
            $image = $request->file('document');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/applications/', $fileName);
            $application->document = $fileName;
        }
        $application->update();

        return redirect()->route('applications.index')->with('success', 'Information has been updated');
    }

    public function leave_application_show(Request $request, Application $application)
    {
        if (! $request->ajax()) {
            return view('backend.private.applications.application-view', compact('application'));
        }else {
            return view('backend.private.applications.modal.application-view', compact('application'));
        }
    }

    public function leave_application_cancel(Request $request,Application $application)
    {
        $application->status = $request->status;
        $application->save();

        return redirect()->route('applications.cancel')->with('success', 'Successfully Cancelled Your Application!');
    }

}
