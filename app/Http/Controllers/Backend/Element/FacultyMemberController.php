<?php

namespace App\Http\Controllers\Backend\Element;

use App\Models\FacultyCategory;
use App\Models\FacultyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class FacultyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = FacultyMember::orderBy('id', 'desc')->get();
        return view('backend.faculties.faculty.faculty-index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FacultyCategory::orderBy('id', 'desc')->get();
        return view('backend.faculties.faculty.faculty-add', compact('categories'));
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
            'position_id' => 'required',
            'details' => 'nullable|string',
            'slug' => 'required|unique:faculty_members',
            'photo' => 'nullable|image',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'skype' => 'nullable'
        ],[
            'position_id.required' => 'The Position Field is required'
        ]);

        $faculty = new FacultyMember;
        $faculty->name = $request->name;
        $faculty->position_id = $request->position_id;
        $faculty->facebook = $request->facebook;
        $faculty->slug = $request->slug;
        $faculty->instagram = $request->instagram;
        $faculty->twitter = $request->twitter;
        $faculty->skype = $request->skype;
        $faculty->details = $request->details;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/teams/', $fileName);
            $faculty->photo = 'teams/' . $fileName;
        }
        $faculty->save();

        return redirect()->route('team_members.index')->with('success', 'New member has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FacultyMember $faculty)
    {
        return view('backend.faculties.faculty.faculty-show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FacultyMember $faculty)
    {
        $categories = FacultyCategory::orderBy('id', 'desc')->get();
        return view('backend.faculties.faculty.faculty-edit', compact('faculty', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacultyMember $faculty)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'position_id' => 'required',
            'details' => 'nullable|string',
            'photo' => 'nullable|image',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'slug' => ['required', Rule::unique('faculty_members')->ignore($faculty->id)],
            'skype' => 'nullable'
        ],[
            'position_id.required' => 'The Position field is required'
        ]);

        $faculty->name = $request->name;
        $faculty->position_id = $request->position_id;
        $faculty->slug = $request->slug;
        $faculty->facebook = $request->facebook;
        $faculty->instagram = $request->instagram;
        $faculty->twitter = $request->twitter;
        $faculty->skype = $request->skype;
        $faculty->details = $request->details;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/teams/', $fileName);
            $faculty->photo = 'teams/' . $fileName;
        }
        $faculty->save();

        return redirect()->route('team_members.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacultyMember $faculty)
    {
        $faculty = FacultyMember::find($faculty->id)->delete();
        return redirect()->route('team_members.index')->with('success', 'Information has been deleted');
    }
}
