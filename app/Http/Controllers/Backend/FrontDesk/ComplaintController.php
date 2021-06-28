<?php

namespace App\Http\Controllers\Backend\FrontDesk;

use App\Models\Complain as Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::orderBy('id', 'desc')->get();
        return view('backend.frontdesk.complaints.complaint-index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.complaints.complaint-create');
        }else {
            return view('backend.frontdesk.complaints.modal.complaint-create');
        }
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
            'complaint_by' => 'required|string',
            'source' => 'nullable|string',
            'phone' => 'required',
            'date' => 'required',
            'description' => 'nullable|string',
            'action_taken' => 'nullable|string',
            'assigned_by' => 'required',
            'note' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        $complaint = new Complaint;
        $complaint->slug = Str::uuid();
        $complaint->complaint_by = $request->complaint_by;
        $complaint->source = $request->source;
        $complaint->phone = $request->phone;
        $complaint->date = $request->date;
        $complaint->description = $request->description;
        $complaint->action_taken = $request->action_taken;
        $complaint->assigned_by = $request->assigned_by;
        $complaint->note = $request->note;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/complaints/', $fileName);
            $complaint->image = $fileName;
        }
        $complaint->save();

        return redirect()->route('complaints.index')->with('success', 'Information has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Complaint $complaint)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.complaints.complaint-view', compact('complaint'));
        }else {
            return view('backend.frontdesk.complaints.modal.complaint-view', compact('complaint'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Complaint $complaint)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.complaints.complaint-edit', compact('complaint'));
        }else {
            return view('backend.frontdesk.complaints.modal.complaint-edit', compact('complaint'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        $this->validate($request, [
            'complaint_by' => 'required|string',
            'source' => 'nullable|string',
            'phone' => 'required',
            'date' => 'required',
            'description' => 'nullable|string',
            'action_taken' => 'nullable|string',
            'assigned_by' => 'required',
            'note' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        $complaint->complaint_by = $request->complaint_by;
        $complaint->source = $request->source;
        $complaint->phone = $request->phone;
        $complaint->date = $request->date;
        $complaint->description = $request->description;
        $complaint->action_taken = $request->action_taken;
        $complaint->assigned_by = $request->assigned_by;
        $complaint->note = $request->note;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/complaints/', $fileName);
            $complaint->image = $fileName;
        }
        $complaint->update();

        return redirect()->route('complaints.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'Information has been deleted');
    }
}
