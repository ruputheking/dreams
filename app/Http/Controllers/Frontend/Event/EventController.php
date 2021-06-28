<?php

namespace App\Http\Controllers\Frontend\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 0)->orderBy('id', 'desc')->simplePaginate(4);
        return view('frontend.events.event-list', compact('events'));
    }

    public function show(Event $event)
    {
        return view('frontend.events.event-show', compact('event'));
    }
}
