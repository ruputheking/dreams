<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index($class = "")
     {
 		$sections = array();
 		if($class != ""){
 			$sections = Section::select('*','sections.id AS id','teachers.name as teacher_name')
 									->join('teachers','teachers.id','=','sections.teacher_id')
 									->join('courses','courses.id','=','sections.course_id')
 									->where('sections.course_id', $class)->get();
 		}

         return view('backend.sections.section-add', compact('sections','class'));
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
            'section_name' => 'required|string|max:191',
            'course_id' => 'required|numeric',
            'teacher_id' => 'required',
        ]);

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->course_id = $request->course_id;
        $section->teacher_id = $request->teacher_id;
        $section->save();

        return redirect()->route('sections.index')->with('success', 'Information has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::select('*','sections.id AS id')
                                ->join('courses','courses.id','=','sections.course_id')
                                ->where('sections.id', $id)->first();

        $class = $section->course_id;
        $sections = Section::select('*','sections.id AS id','teachers.name as teacher_name')
                                ->join('teachers','teachers.id','=','sections.teacher_id')
                                ->join('courses','courses.id','=','sections.course_id')
                                ->where('sections.course_id', $class)->get();
        if ($section) {
            return view('backend.sections.section-edit', compact('section', 'sections', 'class'));
        }else {
            return back()->with('error', "You don't have permission");
        }
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
        $this->validate($request, [
            'section_name' => 'required|string|max:255',
            'course_id' => 'required|numeric',
			'teacher_id' => ['required'],
        ]);

        $section = Section::find($id);
        $section->section_name = $request->section_name;
        $section->course_id = $request->course_id;
        $section->teacher_id = $request->teacher_id;
        $section->update();

        return redirect()->route('sections.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        return redirect()->route('sections.index')->with('error', 'Information has been deleted');
    }
}
