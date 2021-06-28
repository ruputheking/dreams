<?php

namespace App\Http\Controllers\Backend\Element;

use Illuminate\Support\Str;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('backend.elements.testimonials.testimonial-index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return view('backend.elements.testimonials.testimonial-create');
        }else {
            return view('backend.elements.testimonials.modal.testimonial-create');
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image'
        ]);

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/testimonials/', $fileName);
            $testimonial->photo = 'testimonials/' . $fileName;
        }
        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Information has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        if (!$request->ajax()) {
            return view('backend.elements.testimonials.testimonial-view', compact('testimonial'));
        }else {
            return view('backend.elements.testimonials.modal.testimonial-view', compact('testimonial'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        if (! $request->ajax()) {
            return view('backend.elements.testimonials.testimonial-edit', compact('testimonial'));
        }else {
            return view('backend.elements.testimonials.modal.testimonial-edit', compact('testimonial'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'photo' => 'nullable|image'
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/testimonials/', $fileName);
            $testimonial->photo = 'testimonials/' . $fileName;
        }
        $testimonial->update();

        return redirect()->route('testimonials.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Information has been deleted');
    }
}
