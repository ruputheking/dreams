<?php

namespace App\Http\Controllers\Backend\Academic;

use Carbon\Carbon;
use App\Models\Section;
use App\Models\Subject;
use App\Models\AssignSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.subjects-assign.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
    		$section = sql_escape($request->section_id);
    		$subjects = AssignSubject::getSubject($request->course_id, $section);
    		return view('backend.subjects-assign.assign-list', compact('subjects','section'));
    }
    public function show($id)
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
        $len = count($request->teacher_id);
    		$insertdata = array();
    		$updatedata = array();

    		for($i = 0; $i<$len; $i++)
        {
    			if($request->a_id[$i] == "")
          {
      				$temp = array();
      				$temp['subject_id'] = $request->subject_id[$i];
      				$temp['teacher_id'] = $request->teacher_id[$i];
                    $temp['section_id'] = $request->section_id[$i];
      				$temp['created_at'] = Carbon::now();
      				$temp['updated_at'] = Carbon::now();
      				array_push($insertdata,$temp);
    			}
          else
          {
      				$temp = array();
      				$temp['subject_id'] = $request->subject_id[$i];
      				$temp['teacher_id'] = $request->teacher_id[$i];
      				$temp['section_id'] = $request->section_id[$i];
      				$temp['updated_at'] = Carbon::now();
      				array_push($updatedata,$temp);
    			}
        }

    		//Insert
    		AssignSubject::insert($insertdata);

    		//Update
    		foreach($updatedata as $d){
    		   AssignSubject::where('subject_id','=',$d['subject_id'])
               ->where('section_id','=',$d['section_id'])
    		   ->update(['teacher_id'=>$d['teacher_id']]);
    		}

    		return response()->json(['result'=>'success','message'=> 'Saved Sucessfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
