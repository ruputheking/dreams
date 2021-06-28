<?php

namespace App\Http\Controllers\Frontend\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventCandidate;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    public function index(Event $event)
    {
        return view('frontend.events.event-register', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);

        $candidate = new EventCandidate;
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->event_id = $event->id;
        $candidate->phone = $request->phone;
        $candidate->save();

        return redirect()->back()->with('success', 'Successfully registed!');
    }
}
