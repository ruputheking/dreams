<?php

namespace App\Http\Controllers\Backend\FrontDesk;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::orderBy('id', 'desc')->get();
        return view('backend.frontdesk.visitors.visitor-index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.visitors.visitor-create');
        }else {
            return view('backend.frontdesk.visitors.modal.visitor-create');
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
            'purpose' => 'required|string',
            'name' => 'required|string',
            'phone' => 'nullable',
            'date' => 'required',
            'in_time' => 'required',
            'out_time' => 'required',
            'note' => 'nullable|string',
            'image' => 'nullable|image',
            'no_of_people' => 'required'
        ]);

        $visitor = new Visitor;
        $visitor->slug = Str::uuid();
        $visitor->purpose = $request->purpose;
        $visitor->name = $request->name;
        $visitor->phone = $request->phone;
        $visitor->date = $request->date;
        $visitor->in_time = $request->in_time;
        $visitor->out_time = $request->out_time;
        $visitor->note = $request->note;
        $visitor->no_of_people = $request->no_of_people;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/visitors/', $fileName);
            $visitor->image = $fileName;
        }
        $visitor->save();

        return redirect()->route('visitors.index')->with('success', 'Information has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visitor $visitor)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.visitors.visitor-view', compact('visitor'));
        }else {
            return view('backend.frontdesk.visitors.modal.visitor-view', compact('visitor'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Visitor $visitor)
    {
        if (!$request->ajax()) {
            return view('backend.frontdesk.visitors.visitor-edit', compact('visitor'));
        }else {
            return view('backend.frontdesk.visitors.modal.visitor-edit', compact('visitor'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        $this->validate($request, [
            'purpose' => 'required|string',
            'name' => 'required|string',
            'phone' => 'nullable',
            'date' => 'required',
            'in_time' => 'required',
            'out_time' => 'required',
            'note' => 'nullable|string',
            'image' => 'nullable|image',
            'no_of_people' => 'required'
        ]);

        $visitor->purpose = $request->purpose;
        $visitor->name = $request->name;
        $visitor->phone = $request->phone;
        $visitor->date = $request->date;
        $visitor->in_time = $request->in_time;
        $visitor->out_time = $request->out_time;
        $visitor->note = $request->note;
        $visitor->no_of_people = $request->no_of_people;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/visitors/', $fileName);
            $visitor->image = $fileName;
        }
        $visitor->update();

        return redirect()->route('visitors.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Information has been deleted');
    }
}
