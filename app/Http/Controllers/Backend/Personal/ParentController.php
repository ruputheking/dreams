<?php

namespace App\Http\Controllers\Backend\Personal;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{
    public function my_profile()
    {
		$parent = \App\Models\ParentModel::join('users','users.id','=','parents.user_id')
					 ->leftJoin('students','parents.id','=','students.parent_id')
                     ->leftJoin('student_sessions','students.id','=','student_sessions.student_id')
                     ->leftJoin('courses','courses.id','=','student_sessions.course_id')
                     ->leftJoin('sections','sections.id','=','student_sessions.section_id')
                     ->where('parents.id', get_parent_id())->first();

        return view('backend.private.parent.profile', compact('parent'));
    }

    public function my_children($student_id)
    {
        $student = \App\Models\Student::join('users','users.id','=','students.author_id')
                     ->join('student_sessions','students.id','=','student_sessions.student_id')
                     ->join('courses','courses.id','=','student_sessions.course_id')
                     ->join('sections','sections.id','=','student_sessions.section_id')
                     ->join('parents','parents.id','=','students.parent_id')
					 ->where('student_sessions.session_id',get_option('academic_years'))
					 ->where('students.parent_id', get_parent_id())
                     ->where('students.id',$student_id)->first();
        return view('backend.private.parent.children_profile',compact('student','student_id'));
    }

    public function children_attendance(Request $request, $student_id)
    {
		if($request->month != ""){
			$month = (explode("/",$request->month));
			$num_of_days =  cal_days_in_month(CAL_GREGORIAN, $month[0], $month[1]);

			$query = DB::table('student_attendances')
					->select('student_attendances.*')
			        ->join('students','student_attendances.student_id','=','students.id')
					->where('student_id', $student_id)
					->where('students.parent_id', get_parent_id())
					->whereMonth('date', $month[0])
					->whereYear('date', $month[1])
					->orderBy('date', 'asc')
					->get();

			$report_data = array();

			for($i = 1; $i<=$num_of_days; $i++){
				$date = new \DateTime($month[1]."-".$month[0]."-".$i);
			    $date = $date->format('Y-m-d');
				$attendance_value = array("0"=>"","1"=>('Present'),"2"=>('Absent'),"3"=>('Late'),"4"=>('Holiday'));
				foreach($query as $data){
					if($date == $data->date){
						$report_data[$date] = $attendance_value[$data->attendance];
					}else{
						if(! isset($report_data[$date])){
							$report_data[$date] = $attendance_value[0];
						}
					}
				}
			}

			$month = $request->month;
			return view('backend.private.parent.children_attendance',compact('student_id','report_data','month'));
		}else{
		   return view('backend.private.parent.children_attendance',compact('student_id'));
	    }
	}

    public function progress_card($student_id){
		$class_id = 0;
		$section_id = "";
		$exam_id = "";

		$student = \App\Models\StudentSession::where("student_id",$student_id)
								  ->where("session_id",get_option('academic_years'))
								  ->first();

		$class_id = $student->course_id;
		$section_id = $student->section_id;


		$student = DB::table("students")->join('users','users.id','=','students.author_id')
				 ->join('student_sessions','students.id','=','student_sessions.student_id')
				 ->join('courses','courses.id','=','student_sessions.course_id')
				 ->join('sections','sections.id','=','student_sessions.section_id')
				 ->where('student_sessions.session_id',get_option('academic_years'))
				 ->where('students.parent_id',get_parent_id())
				 ->where('students.id',$student_id)->first();

		$exams = DB::select("SELECT marks.exam_id,marks.class_id,marks.section_id,marks.subject_id, exams.name
		FROM marks,exams WHERE marks.exam_id=exams.id AND marks.student_id=:student_id
		AND marks.class_id=:class GROUP BY marks.exam_id", ["student_id" => $student_id, "class" => $class_id]);

		$subjects = DB::table("subjects")->where("course_id",$class_id)->get();

		$existing_marks = DB::select("SELECT marks.subject_id, marks.exam_id,mark_details.* from mark_details,marks WHERE mark_details.mark_id=marks.id
		AND marks.class_id=:class AND marks.student_id=:student", ["class"=>$class_id, "student"=>$student_id]);


		$mark_head = DB::select("SELECT distinct mark_details.mark_type from mark_distributions
		JOIN mark_details JOIN marks ON mark_details.mark_type = mark_distributions.mark_distribution_type
		AND mark_details.mark_id=marks.id WHERE
		marks.class_id=:class AND marks.student_id=:student", ["class"=>$class_id, "student"=>$student_id]);

		$mark_details = [];

		foreach($existing_marks as $key=>$val){
			if($val->mark_id != ""){
			   $mark_details[$val->subject_id][$val->exam_id][$val->mark_type] = $val;
			}
		}

		return view('backend.private.parent.progress_card', compact('class_id','section_id','student','exams', 'mark_head', 'mark_details', 'subjects','student_id'));

	}
}
