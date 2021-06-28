<?php

namespace App\Http\Controllers\Backend\Assignment;

use App\Models\Assignment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::select('*','assignments.id AS id')
                            ->join('courses','courses.id','=','assignments.course_id')
                            ->join('sections','sections.id','=','assignments.section_id')
                            ->join('subjects','subjects.id','=','assignments.subject_id')
                            ->where('assignments.session_id', get_option('academic_years'))
                            ->orderBy('assignments.id', 'DESC')
                            ->get();

        return view('backend.assignments.assignment-list', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.assignments.assignment-add');
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
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'deadline' => 'required|date_format:Y-m-d H:i:s',
            'course_id' => 'required',
            'section_id' => 'required',
            'subject_id' => 'required',
            'file' => 'mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
            'file_2' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
            'file_3' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
            'file_4' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
        ]);

        $assignment = new Assignment();
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->deadline = $request->deadline;
        $assignment->course_id = $request->course_id;
        $assignment->section_id = $request->section_id;
        $assignment->subject_id = $request->subject_id;
        $assignment->session_id = get_option('academic_years');

        if($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file = 'assignments/' . $file_name;
        }
        if($request->hasFile('file_2')){
            $file = $request->file('file_2');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file_2 = 'assignments/' . $file_name;
        }
        if($request->hasFile('file_3')){
            $file = $request->file('file_3');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file_3 = 'assignments/' . $file_name;
        }
        if($request->hasFile('file_4')){
            $file = $request->file('file_4');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file_4 = 'assignments/' . $file_name;
        }

        $assignment->save();

        return redirect()->route('assignments.index')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::select('assignments.*','assignments.id AS id', 'courses.title as class_name', 'sections.section_name', 'subjects.subject_name')
                            ->join('courses','courses.id','=','assignments.course_id')
                            ->join('sections','sections.id','=','assignments.section_id')
                            ->join('subjects','subjects.id','=','assignments.subject_id')
                            ->where('assignments.session_id', get_option('academic_years'))
                            ->where('assignments.id',$id)->first();

        if ($assignment) {
            return view('backend.assignments.assignment-show',compact('assignment'));
        }else {
            return back()->with('error', "You don't have permission");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::select('assignments.*', 'assignments.id', 'sections.*', 'subjects.*')->join('courses', 'courses.id', '=', 'assignments.course_id')
                                ->join('sections', 'sections.id', '=', 'assignments.section_id')
                                ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
		                        ->where('assignments.session_id', get_option('academic_years'))
                                ->where("assignments.id",$id)->first();
        if ($assignment) {
            return view('backend.assignments.assignment-edit', compact('assignment'));
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
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'deadline' => 'required|date_format:Y-m-d H:i:s',
            'course_id' => 'required',
            'section_id' => 'required',
            'subject_id' => 'required',
            'file' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
            'file_2' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
            'file_3' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
            'file_4' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg,jpeg,pptx,ppt',
        ]);

        $assignment = Assignment::find($id);
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->deadline = $request->deadline;
        $assignment->course_id = $request->course_id;
        $assignment->section_id = $request->section_id;
        $assignment->subject_id = $request->subject_id;
        $assignment->session_id = get_option('academic_years');

        if($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file = 'assignments/' . $file_name;
        }
        if($request->hasFile('file_2')){
            $file = $request->file('file_2');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file_2 = 'assignments/' . $file_name;
        }
        if($request->hasFile('file_3')){
            $file = $request->file('file_3');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file_3 = 'assignments/' . $file_name;
        }
        if($request->hasFile('file_4')){
            $file = $request->file('file_4');
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move('frontend/images/assignments/', $file_name);
            $assignment->file_4 = 'assignments/' . $file_name;
        }

        $assignment->update();

        return redirect('dashboard/assignments')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id)->delete();

        return redirect('dashboard/assignments')->with('error', 'Information has been deleted');
    }

    public function assign_list()
    {
        $assignments = array();
        $class = '';

        return view('backend.assignments.assign-student', compact('assignments', 'class'));
    }

    public function class($class = '')
    {
        $assignments = Assignment::select('*','assignments.id AS id')
                            ->join('courses','courses.id','=','assignments.course_id')
                            ->join('sections','sections.id','=','assignments.section_id')
                            ->join('subjects','subjects.id','=','assignments.subject_id')
                            ->where('assignments.course_id', $class)
                        ->where('assignments.session_id', get_option('academic_years'))
                            ->orderBy('assignments.id', 'DESC')->get();
                            // dd($assignments->toArray());

        return view('backend.assignments.assign-student',compact('assignments', 'class'));
    }

    public function assign_student($id)
    {
        $files = \App\Models\AssignStudent::select('*', 'assign_students.created_at', 'assign_students.updated_at')
                                       ->join('assignments', 'assignments.id', '=', 'assign_students.topic_id')
                                       ->join('courses', 'courses.id', '=', 'assignments.course_id')
                                       ->join('sections', 'sections.id', '=', 'assignments.section_id')
                                       ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                                       ->join('students', 'students.id', '=', 'assign_students.student_id')
                                       ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                                       ->where('student_sessions.session_id', get_option('academic_years'))
                                       ->where('topic_id', $id)->get();

        return view('backend.assignments.student-list', compact('files'));
    }

    public function show_assigned_student($assignmentid, $studentid)
    {
       $files = \App\Models\StudentAssignment::select('*', 'student_assignments.id As id', 'student_assignments.student_id', 'student_assignments.assignment_id')
                                   ->join('students', 'students.id', '=', 'student_assignments.student_id')
                                   ->join('student_sessions', 'student_sessions.student_id', '=', 'student_assignments.student_id')
                                   ->join('assignments', 'assignments.id', '=', 'student_assignments.assignment_id')
                                   ->where('student_assignments.student_id', $studentid)
                                   ->where('student_sessions.session_id', get_option('academic_years'))
                                   ->where('student_assignments.assignment_id', $assignmentid)->get();

       return view('backend.assignments.studentfile-list', compact('files', 'assignmentid'));
    }

    public function destory_assigned_student($id)
    {
        $files = \App\Models\AssignStudent::find($id)->delete();
        return redirect()->back()->with('success', 'Information has been deleted');
    }
}
