<?php

namespace App\Http\Controllers\Backend\FrontDesk;

use App\Models\PhoneCallLog as GeneralCall;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class GeneralCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generalcalls = GeneralCall::orderBy('id', 'desc')->get();
        return view('backend.frontdesk.generalcalls.generalcall-index', compact('generalcalls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.generalcalls.generalcall-create');
        }else {
            return view('backend.frontdesk.generalcalls.modal.generalcall-create');
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
            'name' => 'nullable|string',
            'contact' => 'required',
            'date' => 'required',
            'call_duration' => 'nullable',
            'follow_up_date' => 'nullable',
            'description' => 'nullable|string',
            'note' => 'nullable|string',
            'call_type' => 'required'
        ]);

        $general_call = new GeneralCall;
        $general_call->slug = Str::uuid();
        $general_call->name = $request->name;
        $general_call->contact = $request->contact;
        $general_call->date = $request->date;
        $general_call->call_duration = $request->call_duration;
        $general_call->follow_up_date = $request->follow_up_date;
        $general_call->description = $request->description;
        $general_call->note = $request->note;
        $general_call->call_type = $request->call_type;
        $general_call->save();

        return redirect()->route('generalcalls.index')->with('success', 'Information has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GeneralCall $generalcall)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.generalcalls.generalcall-view', compact('generalcall'));
        }else {
            return view('backend.frontdesk.generalcalls.modal.generalcall-view', compact('generalcall'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GeneralCall $generalcall)
    {
        $generalcalls = GeneralCall::orderBy('id', 'desc')->get();
        if (!$request->ajax()) {
            return view('backend.frontdesk.generalcalls.generalcall-edit', compact('generalcall', 'generalcalls'));
        }else {
            return view('backend.frontdesk.generalcalls.modal.generalcall-edit', compact('generalcall'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralCall $general_call)
    {
        $this->validate($request, [
            'name' => 'nullable|string',
            'contact' => 'required',
            'date' => 'required',
            'call_duration' => 'nullable',
            'follow_up_date' => 'nullable',
            'description' => 'nullable|string',
            'note' => 'nullable|string',
            'call_type' => 'required'
        ]);

        $general_call->name = $request->name;
        $general_call->contact = $request->contact;
        $general_call->date = $request->date;
        $general_call->call_duration = $request->call_duration;
        $general_call->follow_up_date = $request->follow_up_date;
        $general_call->description = $request->description;
        $general_call->note = $request->note;
        $general_call->call_type = $request->call_type;
        $general_call->update();

        return redirect()->route('generalcalls.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralCall $general_call)
    {
        $general_call->delete();
        return redirect()->route('generalcalls.index')->with('success', 'Information has been deleted');
    }
}
