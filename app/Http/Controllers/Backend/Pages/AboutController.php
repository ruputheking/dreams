<?php

namespace App\Http\Controllers\Backend\Pages;

use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function introduction()
    {
        return view('backend.pages.page-introduction');
    }

    public function director()
    {
        return view('backend.pages.page-director');
    }

    public function facility()
    {
        return view('backend.pages.page-facility');
    }

    public function placement()
    {
        return view('backend.pages.page-placement');
    }

    public function objective()
    {
        return view('backend.pages.page-objective');
    }

    public function introduction_store(Request $request)
    {
        DB::table('settings')->where('settings.name', $request->about_title)->update(['settings.value' => $request->details]);

        return redirect()->back()->with('success', 'Information has been updated');
    }
}
