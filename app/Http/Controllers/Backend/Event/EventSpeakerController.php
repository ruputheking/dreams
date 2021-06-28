<?php

namespace App\Http\Controllers\Backend\Event;

use App\Models\Event;
use Illuminate\Support\Str;
use App\Models\EventSpeaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventSpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = EventSpeaker::orderBy('id', 'desc')->get();
        return view('backend.events.speakers.speaker-list', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('backend.events.speakers.speaker-add', compact('events'));
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
            'position' => 'required|string|max:255',
            'photo' => 'required|image',
            'event_id' => 'required'
        ]);

        $speaker = new EventSpeaker;
        $speaker->name = $request->name;
        $speaker->position = $request->position;
        $speaker->event_id = $request->event_id;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/speakers/', $fileName);
            $speaker->photo = 'events/speakers/' . $fileName;
        }
        $speaker->save();

        return redirect()->route('speakers.index')->with('success', 'Information has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::orderBy('id', 'desc')->get();
        $speaker = EventSpeaker::find($id);
        return view('backend.events.speakers.speaker-edit', compact('speaker', 'events'));
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
        $speaker = EventSpeaker::find($id);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'event_id' => 'required'
        ]);

        $speaker->name = $request->name;
        $speaker->position = $request->position;
        $speaker->event_id = $request->event_id;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/speakers/', $fileName);
            $speaker->photo = 'events/speakers/' . $fileName;
        }
        $speaker->update();

        return redirect()->route('speakers.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EventSpeaker::find($id)->delete();
        return redirect()->route('speakers.index')->with('success', 'Information has been deleted');
    }
}
