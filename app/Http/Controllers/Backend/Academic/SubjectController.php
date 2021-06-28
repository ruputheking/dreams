<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index($class='')
     {
         $subjects = Subject::select('*','subjects.id AS id')
                             ->join('courses','courses.id','=','subjects.course_id')
                             ->where('subjects.course_id', $class)
                             ->orderBy('subjects.id', 'DESC')->get();

         return view('backend.subjects.subject-add', compact('subjects','class'));
     }

     public function create($value='')
     {
         // code...
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
            'subject_name' => 'required|string|max:191',
            'subject_code' => 'required|string|max:191',
            'subject_type' => 'required',
            'course_id' => 'required',
            'pass_mark' => 'required',
            'full_mark' => 'required'
        ]);

        $subject = new Subject;
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->subject_type = $request->subject_type;
        $subject->course_id = $request->course_id;
        $subject->pass_mark = $request->pass_mark;
        $subject->full_mark = $request->full_mark;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Information has been added');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $class = $subject->course_id;
        $subjects = Subject::select('*','subjects.id AS id')
                        ->join('courses','courses.id','=','subjects.course_id')
                        ->where('subjects.course_id', $class)
                        ->orderBy('subjects.id', 'DESC')->get();

        if ($subject) {
            return view('backend.subjects.subject-edit', compact('subject', 'subjects', 'class'));
        }else {
            return redirect()->route('subjects.index')->with('error', "You don't have permission");
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
            'subject_name' => 'required|string|max:191',
            'subject_code' => 'required|string|max:191',
            'subject_type' => 'required',
            'course_id' => 'required',
            'pass_mark' => 'required',
            'full_mark' => 'required'
        ]);

        $subject = Subject::findOrFail($id);
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->subject_type = $request->subject_type;
        $subject->course_id = $request->course_id;
        $subject->pass_mark = $request->pass_mark;
        $subject->full_mark = $request->full_mark;
        $subject->update();

        return redirect()->route('subjects.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Information has been deleted');
    }
}
