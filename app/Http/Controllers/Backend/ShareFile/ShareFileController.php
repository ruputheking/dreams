<?php

namespace App\Http\Controllers\Backend\ShareFile;

use App\Models\ShareFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShareFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_id = '')
    {
        if (get_auth() == 'teacher') {
            $files = ShareFile::select('*', 'share_files.id AS id', 'courses.title as class_name')
                                ->join('assign_subjects', 'assign_subjects.id', '=', 'share_files.subject_id')
                                ->join('courses', 'courses.id', '=', 'share_files.course_id')
                                ->join('subjects', 'subjects.id', '=', 'share_files.subject_id')
                                ->join('sections', 'sections.id', '=', 'share_files.section_id')
                                    ->where('assign_subjects.teacher_id', get_teacher_id())
                                    ->where('share_files.session_id', get_option('academic_years'))
                                ->get();
            return view('backend.sharefiles.sharefile-list', compact('files', 'course_id'));
        }
        $files = ShareFile::select('*', 'share_files.id AS id', 'courses.title as class_name')
                            ->join('courses', 'courses.id', '=', 'share_files.course_id')
                            ->join('subjects', 'subjects.id', '=', 'share_files.subject_id')
                            ->join('sections', 'sections.id', '=', 'share_files.section_id')
                            ->where('share_files.session_id', get_option('academic_years'))
                            ->where('courses.id', $course_id)->get();

        return view('backend.sharefiles.sharefile-list', compact('files', 'course_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sharefiles.sharefile-add');
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
            'file_name' => 'required|string|max:191',
            'course_id' => 'required',
            'section_id' => 'required',
            'subject_id' => 'required',
            'file' => 'required',
        ]);

        if ($request->file('file')) {
            $images = $request->file('file');
            foreach($images as $image)
            {
                $new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move('frontend/images/sharefiles/', $new_name);

                $sharefile = new ShareFile;
                $sharefile->file_name = $request->file_name;
                $sharefile->course_id = $request->course_id;
                $sharefile->section_id = $request->section_id;
                $sharefile->subject_id = $request->subject_id;
                $sharefile->session_id = get_option('academic_years');
                $sharefile->file = 'sharefiles/'.$new_name;
                $sharefile->save();
            }
        }

        return redirect()->route('sharefiles.index')->with('success', 'You have been shared File');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = ShareFile::find($id);
        $file->delete();

        return redirect()->route('sharefiles.index')->with('success', 'File has been deleted');
    }
}
