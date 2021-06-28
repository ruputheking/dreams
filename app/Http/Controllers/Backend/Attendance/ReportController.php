<?php

namespace App\Http\Controllers\Backend\Attendance;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_attendance_report(Request $request, $view="")
    {
        $course_id =0;
		$section_id ="";
        $subject_id = "";
		$month = "";
		if($view == ""){
			return view('backend.reports.student_attendance_report', compact('course_id','section_id','month', 'subject_id'));
        }else{
			$course_id = $request->course_id;
            $section_id = $request->section_id;
			$subject_id = $request->subject_id;
			$class = get_class_name($course_id);
			$section = get_section_name($section_id);
            $subject = \App\Models\Subject::find($subject_id)->subject_name;
			$month = (explode("/",$request->month));
			$num_of_days =  cal_days_in_month(CAL_GREGORIAN, $month[0], $month[1]);

			$query = DB::table('student_attendances')
					->whereMonth('date', $month[0])
					->whereYear('date', $month[1])
                    ->where('student_attendances.subject_id', $subject_id)
					->orderBy('date', 'asc')->get();

	        $query2 = DB::table("students")
						->join("student_sessions","students.id","=","student_sessions.student_id")
			            ->where("student_sessions.course_id",$course_id)
			            ->where("student_sessions.section_id",$section_id)
						->orderBy('students.id', 'asc')->get();

			$report_data = array();
			$students = array();

			for($i = 1; $i<=$num_of_days; $i++){
				$date = new \DateTime($month[1]."-".$month[0]."-".$i);
			    $date = $date->format('Y-m-d');
				$attendance_value = array("0"=>"","1"=>"P","2"=>"A","3"=>"L","4"=>"H");
				foreach($query as $data){
					if($date == $data->date){
						$report_data[$data->student_id][$date] = $attendance_value[$data->attendance];
					}else{
						if(! isset($report_data[$data->student_id][$date])){
							$report_data[$data->student_id][$date] = $attendance_value[0];
						}
					}
				}
			}
			foreach($query2 as $student){
				$students[$student->student_id] = $student;
			}


			$month = $request->month;
		    return view('backend.reports.student_attendance_report', compact('course_id','section_id','class','section','report_data','num_of_days','students','month', 'subject_id', 'subject'));
		}
    }

    /**
     * Show the form for staff_attendance_report a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staff_attendance_report(Request $request, $view="")
    {
        $user_type ="";
		$month = "";
		if($view == ""){
			return view('backend.reports.staff_attendance_report',compact('user_type','month'));
        }else{
			$user_type = $request->user_type;
			$month = (explode("/",$request->month));
			$num_of_days =  cal_days_in_month(CAL_GREGORIAN, $month[0], $month[1]);

            if ($request->user_type == 2) {
                $query = DB::table('staff_attendances')
                                ->join("users","users.id","=","staff_attendances.user_id")
                                ->join('teachers', 'teachers.author_id', '=', 'users.id')
                                ->select('staff_attendances.*')
                                ->whereMonth('date', $month[0])
                                ->whereYear('date', $month[1])
                                ->orderBy('date', 'asc')->get();

                $query2 = DB::table("users")
                            ->select('*', 'users.id AS id')
                            ->join('teachers', 'teachers.author_id', '=', 'users.id')
                            ->orderBy('users.id', 'asc')->get();

            }else {
                $query = DB::table('staff_attendances')
                        ->join("users","users.id","=","staff_attendances.user_id")
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->join('roles', 'roles.id', '=', 'role_user.role_id')
                        ->select('staff_attendances.*')
                        ->where("role_user.role_id", $user_type)
                        ->whereMonth('date', $month[0])
                        ->whereYear('date', $month[1])
                        ->orderBy('date', 'asc')->get();

                $query2 = DB::table("users")
                            ->select('*', 'users.id AS id')
                            ->join('role_user', 'role_user.user_id', '=', 'users.id')
                            ->join('roles', 'roles.id', '=', 'role_user.role_id')
                            ->where("role_user.role_id", $user_type)
                            ->orderBy('users.id', 'asc')->get();
            }

			$report_data = array();
			$users = array();

			for($i = 1; $i<=$num_of_days; $i++){
				$date = new \DateTime($month[1]."-".$month[0]."-".$i);
			    $date = $date->format('Y-m-d');
				$attendance_value = array("0"=>"","1"=>"P","2"=>"A","3"=>"L","4"=>"H");
				foreach($query as $data){
					if($date == $data->date){
						$report_data[$data->user_id][$date] = $attendance_value[$data->attendance];
					}else{
						if(! isset($report_data[$data->user_id][$date])){
							$report_data[$data->user_id][$date] = $attendance_value[0];
						}
					}
				}
			}

			foreach($query2 as $user){
				$users[$user->id] = $user;
			}


			$month = $request->month;
            if ($user_type == 2) {
                $user_type = 'Teacher';
            }
            if ($user_type == 5) {
                $user_type = 'Accountant';
            }
            if ($user_type == 6) {
                $user_type = 'Receptionist';
            }
		    return view('backend.reports.staff_attendance_report', compact('user_type','report_data','users','num_of_days','month'));
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function student_id_card(Request $request, $view="")
    {
        $course_id = 0;
		$section_id = "";

		if($view == ""){
			return view('backend.reports.student_id_card',compact('course_id','section_id'));
        }else{
			$course_id = $request->course_id;
			$section_id = $request->section_id;
			$student_id = $request->student_id;
			$student = DB::table("students")
			         ->join('users','users.id','=','students.author_id')
                     ->join('student_sessions','students.id','=','student_sessions.student_id')
                     ->join('courses','courses.id','=','student_sessions.course_id')
                     ->join('sections','sections.id','=','student_sessions.section_id')
                      ->where('student_sessions.session_id',get_option('academic_years'))
                     ->where('students.id',$student_id)->first();

			return view('backend.reports.student_id_card', compact('course_id','section_id','student'));

		}
    }
}
