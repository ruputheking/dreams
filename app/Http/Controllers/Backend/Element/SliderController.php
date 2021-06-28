<?php

namespace App\Http\Controllers\Backend\Element;

use Str;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('backend.sliders.slider-list', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.slider-add');
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
            'title' => 'nullable|string',
            'photo' => 'required|image|max:12288',
            'summary' => 'nullable|string',
            'button_first' => 'nullable|string',
            'url_first' => 'nullable|string',
            'button_second' => 'nullable|string',
            'url_second' => 'nullable|string',
            'position' => 'required'
        ]);


        $slider = new Slider;
        $slider->title = $request->title;
        $slider->details = $request->summary;
        $slider->url_link1 = $request->url_first;
        $slider->button1 = $request->button_first;
        $slider->url_link2 = $request->url_second;
        $slider->button2 = $request->button_second;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/sliders/', $fileName);
            $slider->photo = 'sliders/' . $fileName;
        }
        $slider->position = $request->position;
        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Information has been added');
    }

    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.sliders.slider-view', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.sliders.slider-edit', compact('slider'));
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
            'title' => 'nullable|string',
            'photo' => 'nullable|image|max:12288',
            'summary' => 'nullable|string',
            'button_first' => 'nullable|string',
            'url_first' => 'nullable|string',
            'button_second' => 'nullable|string',
            'url_second' => 'nullable|string',
            'position' => 'required'
        ]);


        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->details = $request->summary;
        $slider->url_link1 = $request->url_first;
        $slider->button1 = $request->button_first;
        $slider->url_link2 = $request->url_second;
        $slider->button2 = $request->button_second;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/sliders/', $fileName);
            $slider->photo = 'sliders/' . $fileName;
        }
        $slider->position = $request->position;
        $slider->update();

        return redirect()->route('sliders.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        return redirect()->route('sliders.index')->with('success', 'Information has been deleted');
    }
}
