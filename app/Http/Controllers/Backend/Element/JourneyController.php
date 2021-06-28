<?php

namespace App\Http\Controllers\Backend\Element;

use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JourneyController extends Controller
{
    public function index()
    {
        return view('backend.elements.journey.journey-index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'journey_poster' => 'nullable|image',
            'journey_title' => 'required|string',
            'journey_details' => 'required|string',
            'journey_youtube' => 'required|string'
        ]);

        if ($request->hasFile('journey_poster')) {
            $image = $request->file('journey_poster');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/', $fileName);
            DB::table('settings')->where('settings.name', 'journey-poster')->update(['settings.value' => $fileName]);
        }

        DB::table('settings')->where('settings.name', 'journey-youtube')->update(['settings.value' => $request->journey_youtube]);
        DB::table('settings')->where('settings.name', 'journey-title')->update(['settings.value' => $request->journey_title]);
        DB::table('settings')->where('settings.name', 'journey-details')->update(['settings.value' => $request->journey_details]);

        return redirect()->back()->with('success', 'Information has been updated');
    }
}
