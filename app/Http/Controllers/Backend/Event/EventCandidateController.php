<?php

namespace App\Http\Controllers\Backend\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventCandidate;
use App\Http\Controllers\Controller;

class EventCandidateController extends Controller
{
    public function index(Event $event)
    {
        $candidates = EventCandidate::where('event_id', $event->id)->orderBy('id', 'desc')->get();
        return view('backend.events.candidates.candidate-index', compact('candidates'));
    }

    public function destroy($id)
    {
        EventCandidate::find($id)->delete();
        return redirect()->back()->with('success', 'Information has been deleted.');
    }
}
