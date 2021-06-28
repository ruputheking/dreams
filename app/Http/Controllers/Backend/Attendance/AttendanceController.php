<?php

namespace App\Http\Controllers\Backend\Attendance;

use Auth;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\StaffAttendance;
use App\Http\Controllers\Controller;
use App\Models\StudentAttendance AS SAttendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_attendance(Request $request)
    {

        $attendance = [];
		$course_id = $request->course_id;
        $section_id = $request->section_id;
		$date = $request->date;
		if($course_id == "" || $section_id == "" || $date == "")
        {
            return view('backend.attendance.student-attendance', compact('attendance','date','course_id','section_id'));
        }
        else
        {
            $class = Course::find($course_id)->class_name;
            $section = Section::find($section_id)->section_name;

  			$attendance = Student::select('*','student_attendances.id')
  									->leftJoin('student_attendances',function($join) use ($date) {
  										$join->on('student_attendances.student_id','=','students.id');
  										$join->where('student_attendances.date','=',$date);
  									})
  									->join('student_sessions','student_sessions.student_id','=','students.id')
                                    ->join('subjects', 'subjects.course_id', '=', 'student_sessions.course_id')
  									->where('student_sessions.session_id', get_option('academic_years'))
  									->where('student_sessions.course_id',$course_id)
                                    ->where('student_sessions.section_id',$section_id)->get();

  			return view('backend.attendance.student-attendance', compact('attendance','date','class','section','course_id','section_id'));
        }
  	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function student_attendance_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attendance' => 'required',
        ]);
        if ($validator->fails()) {
            if ($request->ajax()) {
                 return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
            }else {
                return redirect('dashboard/student/attendance')
                            ->withErrors($validator)
                            ->withInput();
            }
        }


        for ($i=0; $i < count($request->student_id); $i++) {
            $temp = array();
            $temp['student_id'] = (int)$request->student_id[$i];
            $temp['course_id'] = (int)$request->course_id[$i];
            $temp['section_id'] = (int)$request->section_id[$i];
            $temp['date'] = $request->date;

            $studentAtt = SAttendance::firstOrNew($temp);
            $studentAtt->student_id = $temp['student_id'];
            $studentAtt->course_id = $temp['course_id'];
            $studentAtt->section_id = $temp['section_id'];
            $studentAtt->date = $temp['date'];
            $studentAtt->attendance = isset($request->attendance[$i]) ? $request->attendance[$i][0] : 0;
            $studentAtt->save();
        }

        if (! $request->ajax()) {
            return redirect('dashboard/student/attendance')->with('success', 'Saved Sucessfully');
        }
        else {
            return response()->json(['result'=>'success','action'=>'store','message'=> 'Saved Sucessfully']);
        }
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staff_attendance(Request $request)
    {
        $attendance =[];
		$date = $request->date;
		$user_type = $request->user_type;

		if($date == "")
        {
            return view('backend.attendance.staff-attendance',compact('attendance','date','user_type'));
        }
        else {
            if ($request->user_type == 2) {
                $attendance = User::select('*','users.id as user_id','staff_attendances.id as attendance_id')
                                    ->leftJoin('staff_attendances',function($join) use ($date) {
                                        $join->on('users.id','=','staff_attendances.user_id');
                                        $join->where('staff_attendances.date','=',$date);
                                    })
                                    ->join('teachers', 'teachers.author_id', '=', 'users.id')
                                    ->join('role_user', 'role_user.user_id', '=', 'users.id')
                                    ->where('role_user.role_id', $user_type)
                                    ->orderBy('users.id', 'DESC')->get();

            }
            else {
                $attendance = User::select('*','users.id as user_id','staff_attendances.id as attendance_id')
                                    ->leftJoin('staff_attendances',function($join) use ($date) {
                                        $join->on('users.id','=','staff_attendances.user_id');
                                        $join->where('staff_attendances.date','=',$date);
                                    })
                                    ->join('role_user', 'role_user.user_id', '=', 'users.id')
                                    ->where('role_user.role_id', $user_type)
                                    ->orderBy('users.id', 'DESC')->get();
            }

            return view('backend.attendance.staff-attendance', compact('attendance','date','user_type'));
        }
  	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function staff_attendance_save(Request $request)
    {
    		$validator = Validator::make($request->all(), [
                'attendance' => 'required',
            ]);


        if ($validator->fails())
        {
  			if($request->ajax())
            {
  			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
  			}
            else
            {
				return redirect('dashboard/staff/attendance')
                          ->withErrors($validator)
                          ->withInput();
  			}
        }

        for ($i=0; $i < count($request->user_id) ; $i++)
        {
      			$temp = array();
      			$temp['user_id'] = $request->user_id[$i];
      			$temp['date'] = $request->date;

      			$staffAtt = StaffAttendance::firstOrNew($temp);
      			$staffAtt->user_id = $temp['user_id'];
                $staffAtt->date = $temp['date'];
      			$staffAtt->attendance = isset($request->attendance[$i]) ? $request->attendance[$i][0] : 0;;
      			$staffAtt->save();
        }

		if(! $request->ajax())
        {
		   return redirect('dashboard/staff/attendance')->with('success', 'Saved Sucessfully');
        }
        else
        {
		   return response()->json(['result'=>'success','action'=>'store','message'=> 'Saved Sucessfully']);
		}
    }
}
