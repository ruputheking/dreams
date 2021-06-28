<?php

namespace App\Http\Controllers\Backend\Element;

use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitController extends Controller
{
    public function index()
    {
        return view('backend.elements.benefits.benefit-index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'popular_course' => 'required|string',
            'modern_book' => 'required|string',
            'qualified_teacher' => 'required|string',
            'update_notification' => 'required|string',
            'entertainment_facilities' => 'required|string',
            'online_support' => 'required|string',
            'featured_image' => 'nullable'
        ]);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/', $fileName);
            DB::table('settings')->where('settings.name', 'why-choose-us')->update(['settings.value' => $fileName]);
        }

        DB::table('settings')->where('settings.name', 'popular-courses')->update(['settings.value' => $request->popular_course]);
        DB::table('settings')->where('settings.name', 'modern-book-library')->update(['settings.value' => $request->modern_book]);
        DB::table('settings')->where('settings.name', 'qualified-teacher')->update(['settings.value' => $request->qualified_teacher]);
        DB::table('settings')->where('settings.name', 'update-notification')->update(['settings.value' => $request->update_notification]);
        DB::table('settings')->where('settings.name', 'entertainment-facilities')->update(['settings.value' => $request->entertainment_facilities]);
        DB::table('settings')->where('settings.name', 'online-support')->update(['settings.value' => $request->online_support]);

        return redirect()->back()->with('success', 'Information has been updated');
    }
}
