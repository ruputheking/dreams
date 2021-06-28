<?php

namespace App\Http\Controllers\Backend\Event;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy("id", 'desc')->get();
        return view('backend.events.event-list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if( ! $request->ajax()){
		   return view('backend.events.event-add');
		}else{
           return view('backend.events.modal.event-add');
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
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
    		'end_time' => 'required',
            'slug' => 'required|unique:events',
            'host' => 'required',
            'quote' => 'nullable|string',
            'file_1' => 'required|image',
            'file_2' => 'required|image',
            'file_3' => 'required|image',
            'file_4' => 'nullable|image',
            'file_5' => 'nullable|image',
            'file_6' => 'nullable|image',
    		'name' => 'required',
    		'details' => 'required',
    		'location' => 'required',
        ]);

        $event= new Event();
	    $event->starting_date = $request->input('start_date');
    	$event->ending_date = $request->input('end_date');
        $event->start_time = $request->input('start_time');
    	$event->end_time = $request->input('end_time');
        $event->title = $request->input('name');
        $event->slug = $request->input('slug');
        $event->host = $request->input('host');
    	$event->quote = $request->input('quote');
    	$event->details = $request->input('details');
    	$event->location = $request->input('location');
        if ($request->hasFile('file_1')) {
            $image = $request->file('file_1');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_1 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_2')) {
            $image = $request->file('file_2');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_2 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_3')) {
            $image = $request->file('file_3');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_3 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_4')) {
            $image = $request->file('file_4');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_4 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_5')) {
            $image = $request->file('file_5');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_5 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_6')) {
            $image = $request->file('file_6');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_6 = 'events/' . $fileName;
        }
        $event->save();

		if(! $request->ajax()){
           return redirect()->route('events.index')->with('success', 'Information has been added sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=> 'Information has been added sucessfully','data'=>$event]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Event $event)
    {
		if(! $request->ajax()){
		    return view('backend.events.event-view', compact('event'));
		}else{
			return view('backend.events.modal.event-view', compact('event'));
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Event $event)
    {
        if(! $request->ajax()){
		   return view('backend.events.event-edit', compact('event'));
		}else{
           return view('backend.events.modal.event-edit', compact('event'));
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'start_date' => 'required',
    		'end_date' => 'required',
            'slug' => ['required', Rule::unique('events')->ignore($event->id)],
            'host' => 'required',
            'quote' => 'nullable|string',
            'file_1' => 'nullable|image',
            'file_2' => 'nullable|image',
            'file_3' => 'nullable|image',
            'file_4' => 'nullable|image',
            'file_5' => 'nullable|image',
            'file_6' => 'nullable|image',
            'start_time' => 'required',
            'end_time' => 'required',
    		'name' => 'required',
    		'details' => 'required',
    		'location' => 'required'
        ]);

	    $event->starting_date = $request->input('start_date');
        $event->ending_date = $request->input('end_date');
        $event->start_time = $request->input('start_time');
    	$event->end_time = $request->input('end_time');
        $event->title = $request->input('name');
        $event->slug = $request->input('slug');
        $event->host = $request->input('host');
    	$event->quote = $request->input('quote');
    	$event->details = $request->input('details');
    	$event->location = $request->input('location');
        if ($request->hasFile('file_1')) {
            $image = $request->file('file_1');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_1 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_2')) {
            $image = $request->file('file_2');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_2 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_3')) {
            $image = $request->file('file_3');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_3 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_4')) {
            $image = $request->file('file_4');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_4 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_5')) {
            $image = $request->file('file_5');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_5 = 'events/' . $fileName;
        }
        if ($request->hasFile('file_6')) {
            $image = $request->file('file_6');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/events/', $fileName);
            $event->file_6 = 'events/' . $fileName;
        }
        $event->update();

        if(! $request->ajax()){
           return redirect()->route('events.index')->with('success', 'Information has been updated sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'update', 'message'=> 'Information has been updated sucessfully','data'=>$event]);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Information has been deleted sucessfully');
    }

    public function calendar()
    {
        return view('backend.events.event-calendar');
    }
}
