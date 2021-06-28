<?php

namespace App\Http\Controllers\Backend\Element;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        return view('backend.administration.general_settings.settings');
    }

    public function logo_update(Request $request)
    {
        $this->validate($request, [
            'logo' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG',
        ]);

        if ($request->hasFile('logo'))
        {
            $image       = $request->file('logo');
            $fileName    = Str::uuid() . '' . $image->getClientOriginalName();
            $destination = public_path('/frontend/images/');

            $successUploaded = $image->move($destination, $fileName);
            DB::table('settings')->where('settings.name', '=', 'logo')->update(['settings.value' => $fileName]);
        }
        return redirect()->back()->with('success', 'Logo has been updated');
    }

    public function meta_update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'seo_meta_keywords' => 'required|string|max:300',
            'seo_meta_description' => 'required|string|max:300',
            'image' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG'
        ]);

        if ($request->hasFile('image'))
        {
            $image       = $request->file('image');
            $fileName    = Str::uuid() . '' . $image->getClientOriginalName();
            $destination = public_path('/frontend/images/');

            $successUploaded = $image->move($destination, $fileName);
            DB::table('settings')->where('settings.name', '=', 'image')->update(['settings.value' => $fileName]);
        }
        DB::table('settings')->where('settings.name', '=', 'title')->update(['settings.value' => $request->title]);
        DB::table('settings')->where('settings.name', '=', 'seo_meta_keywords')->update(['settings.value' => $request->seo_meta_keywords]);
        DB::table('settings')->where('settings.name', '=', 'seo_meta_description')->update(['settings.value' => $request->seo_meta_description]);

        return redirect()->back()->with('success', 'Information has been added');
    }

    public function social_store(Request $request)
    {
        DB::table('settings')->where('settings.name', '=', 'facebook')->update(['settings.value' => $request->facebook]);
        DB::table('settings')->where('settings.name', '=', 'youtube')->update(['settings.value' => $request->youtube]);
        DB::table('settings')->where('settings.name', '=', 'instagram')->update(['settings.value' => $request->instagram]);

        return redirect()->back()->with('success', 'Information has been updated');
    }

    public function office_store(Request $request)
    {
        DB::table('settings')->where('settings.name', '=', 'address')->update(['settings.value' => $request->address]);
        DB::table('settings')->where('settings.name', '=', 'starting_time')->update(['settings.value' => $request->starting_time]);
        DB::table('settings')->where('settings.name', '=', 'ending_time')->update(['settings.value' => $request->ending_time]);
        DB::table('settings')->where('settings.name', '=', 'office_email')->update(['settings.value' => $request->office_email]);
        DB::table('settings')->where('settings.name', '=', 'landline')->update(['settings.value' => $request->phone]);
        DB::table('settings')->where('settings.name', '=', 'official_phone')->update(['settings.value' => $request->mobile]);
        DB::table('settings')->where('settings.name', '=', 'secondary_email')->update(['settings.value' => $request->secondary_email]);
        DB::table('settings')->where('settings.name', '=', 'map')->update(['settings.value' => $request->map]);

        return redirect()->back()->with('success', 'Information has been updated');
    }

    public function bank_accounts(Request $request)
    {
        DB::table('settings')->where('settings.name', '=', 'esewa_payee')->update(['settings.value' => $request->esewa_payee]);
        DB::table('settings')->where('settings.name', '=', 'esewa_id')->update(['settings.value' => $request->esewa_id]);
        DB::table('settings')->where('settings.name', '=', 'bank_account_name')->update(['settings.value' => $request->bank_account_name]);
        DB::table('settings')->where('settings.name', '=', 'bank_id')->update(['settings.value' => $request->bank_id]);
        DB::table('settings')->where('settings.name', '=', 'bank_name')->update(['settings.value' => $request->bank_name]);
        DB::table('settings')->where('settings.name', '=', 'bank_branch')->update(['settings.value' => $request->bank_branch]);

        return redirect()->back()->with('success', 'Information has been updated');
    }
}
