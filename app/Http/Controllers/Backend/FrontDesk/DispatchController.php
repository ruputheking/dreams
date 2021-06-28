<?php

namespace App\Http\Controllers\Backend\FrontDesk;

use App\Models\PostalReceive as Dispatch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispatches = Dispatch::orderBy('id', 'desc')->where('status', 0)->get();
        return view('backend.frontdesk.dispatches.dispatch-index', compact('dispatches'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function receive()
    {
        $dispatches = Dispatch::orderBy('id', 'desc')->where('status', 1)->get();
        return view('backend.frontdesk.dispatches.receive.dispatch-index', compact('dispatches'));
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
            'to_title' => 'required|string',
            'address' => 'nullable',
            'from_title' => 'required',
            'note' => 'nullable|string',
            'date' => 'required',
            'image' => 'nullable|image',
        ]);

        $dispatch = new Dispatch;
        $dispatch->slug = Str::uuid();
        $dispatch->to_title = $request->to_title;
        $dispatch->address = $request->address;
        $dispatch->from_title = $request->from_title;
        $dispatch->note = $request->note;
        $dispatch->date = $request->date;
        $dispatch->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/dispatches', $fileName);
            $dispatch->image = $fileName;
        }
        $dispatch->save();

        return redirect()->route('dispatches.index')->with('success', 'Information has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Dispatch $dispatch)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.dispatches.dispatch-view', compact('dispatch'));
        }else {
            return view('backend.frontdesk.dispatches.modal.dispatch-view', compact('dispatch'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Dispatch $dispatch)
    {
        $dispatches = Dispatch::orderBy('id', 'desc')->where('status', 0)->get();
        return view('backend.frontdesk.dispatches.dispatch-edit', compact('dispatch', 'dispatches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function receive_edit(Request $request, Dispatch $dispatch)
    {
        $dispatches = Dispatch::orderBy('id', 'desc')->where('status', 1)->get();
        return view('backend.frontdesk.dispatches.receive.dispatch-edit', compact('dispatch', 'dispatches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispatch $dispatch)
    {
        $this->validate($request, [
            'to_title' => 'required|string',
            'address' => 'nullable',
            'from_title' => 'required',
            'note' => 'nullable|string',
            'date' => 'required',
            'image' => 'nullable|image',
        ]);

        $dispatch = new Dispatch;
        $dispatch->slug = Str::uuid();
        $dispatch->to_title = $request->to_title;
        $dispatch->address = $request->address;
        $dispatch->from_title = $request->from_title;
        $dispatch->note = $request->note;
        $dispatch->date = $request->date;
        $dispatch->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/dispatches', $fileName);
            $dispatch->image = $fileName;
        }
        $dispatch->update();

        return redirect()->route('dispatches.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispatch $dispatch)
    {
        $dispatch->delete();
        return redirect()->route('dispatches.index')->with('success', 'Information has been deleted');
    }
}
