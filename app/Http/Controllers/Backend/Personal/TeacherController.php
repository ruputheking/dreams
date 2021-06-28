<?php

namespace App\Http\Controllers\Backend\Personal;

use DB;
use Auth;
use App\Models\Subject;
use App\Models\Assignment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function my_profile()
    {
		$teacher = \App\Models\Teacher::select('*','teachers.id AS id')
                            ->join('users','users.id','=','teachers.author_id')
                            ->where('teachers.id', get_teacher_id())
                            ->first();

        return view('backend.private.teacher.profile', compact('teacher'));
    }

    public function class_schedule()
    {
		$routine = \App\Models\ClassRoutine::getTeacherRoutine(get_teacher_id());
		return view('backend.private.teacher.class_schedule', compact('routine'));
    }

    public function mark_register()
    {
		$data = array();
		$data['class_id'] = 0;
		$data['section_id'] = 0;
		return view('backend.private.teacher.mark_register',$data);
    }

    public function assignments() {
        $assignments = \App\Models\Assignment::select('*','assignments.id AS id', 'courses.title as class_name', 'assignments.title as title')
                             ->join('courses','courses.id','=','assignments.course_id')
                             ->join('sections','sections.id','=','assignments.section_id')
                             ->join('subjects','subjects.id','=','assignments.subject_id')
                             ->join('assign_subjects','subjects.id','=','assign_subjects.subject_id')
                                 ->where('assign_subjects.teacher_id', get_teacher_id())
                                 ->where('assignments.session_id', get_option('academic_years'))
                             ->orderBy('assignments.id', 'DESC')
                             ->get();

        return view('backend.private.teacher.assignments.assignment-list',compact('assignments'));
    }

    public function create_mark(Request $request)
    {
	    $exam = $request->input('exam');
		$class_id = $request->input('class_id');
		$section_id = $request->input('section_id');
		$subject_id = $request->input('subject_id');
		$marks =[];
		$mark_destributions =[];
		$new_fields = [];

		if( $exam != "" && $class_id != "" && $section_id != "" && $subject_id != "" ){
				$marks = \App\Models\Student::select('*','marks.id as mark_id')
					   ->leftJoin('marks',function($join) use ($exam, $class_id, $subject_id, $section_id) {
							$join->on('marks.student_id','=','students.id');
							$join->where('marks.exam_id','=',$exam);
							$join->where('marks.subject_id','=',$subject_id);
							$join->where('marks.class_id','=',$class_id);
							$join->where('marks.section_id','=',$section_id);
						})
						->join('student_sessions','student_sessions.student_id','=','students.id')
						->where('student_sessions.course_id',$class_id)
						->where('student_sessions.section_id',$section_id)
						->orderBy('students.id', 'ASC')
						->get();

			$mark_destributions = \App\Models\MarkDistribution::where("is_active","=","yes")->get();

			$existing_marks = DB::select("SELECT mark_distributions.*, mark_details.* from mark_distributions
			LEFT JOIN mark_details ON mark_details.mark_type = mark_distributions.mark_distribution_type AND mark_details.mark_id IN
			(SELECT id FROM marks WHERE class_id=:class AND section_id=:section AND subject_id=:subject AND exam_id=:exam)
			WHERE mark_distributions.is_active='yes'", ["class"=>$class_id, "section"=>$section_id, "subject"=>$subject_id, "exam"=>$exam]);

			$new_fields = DB::select("SELECT mark_distributions.*, mark_details.* from mark_distributions LEFT JOIN mark_details
			ON mark_details.mark_type = mark_distributions.mark_distribution_type AND mark_details.mark_id IN
			(SELECT id FROM marks WHERE class_id=:class AND section_id=:section AND subject_id=:subject AND exam_id=:exam)
			WHERE mark_distributions.is_active='yes' and mark_details.mark_id IS NULL",
			["class"=>$class_id, "section"=>$section_id, "subject"=>$subject_id, "exam"=>$exam]);


			$mark_details = [];

			foreach($existing_marks as $key=>$val){
				if($val->mark_id != ""){
				   $mark_details[$val->mark_id][$val->mark_type] = $val;
				}
			}
		}
	    return view('backend.private.teacher.mark_register',compact('mark_details', 'mark_destributions', 'new_fields', 'marks', 'exam', 'class_id', 'section_id', 'subject_id'));

	}

	public function store_mark(Request $request)
    {
        for ($i=0; $i < count($request->student_id) ; $i++) {
			$temp = array();
			$temp['exam_id'] = (int)$request->exam_id[$i];
			$temp['subject_id'] = (int)$request->subject_id[$i];
			$temp['student_id'] = (int)$request->student_id[$i];
			$temp['class_id'] = (int)$request->class_id[$i];
			$temp['section_id'] = (int)$request->section_id[$i];

			$marks = \App\Models\Mark::firstOrNew($temp);
			$marks->exam_id = $temp['exam_id'];
			$marks->subject_id = $temp['subject_id'];
			$marks->student_id = $temp['student_id'];
			$marks->class_id = $temp['class_id'];
			$marks->section_id = $temp['section_id'];
			$marks->save();

			//Store Mark Details
			foreach($request->marks as $key=>$value){

                $temp2 = array();
				$temp2['mark_id'] = $marks->id;
				$temp2['mark_type'] = $key;

				$marksDt = \App\Models\MarkDetails::firstOrNew($temp2);
				$marksDt->mark_id = $marks->id;
				$marksDt->mark_type = $key;
				$marksDt->mark_value = $value[$temp['student_id']];
				$marksDt->save();
			}
        }


		if(! $request->ajax()){
		   return redirect('dashboard/teacher/marks/create')->with('success', 'Saved Sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=> 'Saved Sucessfully']);
		}
   }

    public function create_assignment()
    {
        return view('backend.private.teacher.assignments.assignment-add');
    }

    public function store_assignment(Request $request)
     {
         $this->validate($request, [
             'title' => 'required|string|max:191',
             'description' => 'nullable|string',
             'deadline' => 'required|date_format:Y-m-d H:i:s',
             'course_id' => 'required',
             'section_id' => 'required',
             'subject_id' => 'required',
             'file' => 'nullable',
             'file_2' => 'nullable',
             'file_3' => 'nullable',
             'file_4' => 'nullable',
         ]);

         $assignment = new \App\Models\Assignment();
         $assignment->session_id = get_option("academic_years");
         $assignment->title = $request->title;
         $assignment->description = $request->description;
         $assignment->deadline = $request->deadline;
         $assignment->course_id = $request->course_id;
         $assignment->section_id = $request->section_id;
         $assignment->subject_id = $request->subject_id;

         if($request->hasFile('file')){
             $file = $request->file('file');
             $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/',$file_name);
             $assignment->file = $file_name;
         }
         if($request->hasFile('file_2')){
             $file = $request->file('file_2');
             $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/',$file_name);
             $assignment->file_2 = $file_name;
         }
         if($request->hasFile('file_3')){
             $file = $request->file('file_3');
             $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/',$file_name);
             $assignment->file_3 = $file_name;
         }
         if($request->hasFile('file_4')){
             $file = $request->file('file_4');
             $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/',$file_name);
             $assignment->file_4 = $file_name;
         }

         $assignment->save();

         return redirect('dashboard/teacher/assignments')->with('success', 'Information has been added');
     }

     public function edit_assignment($id)
     {
         $assignment = \App\Models\Assignment::select('*','assignments.id AS id', 'assignments.title as title', 'courses.title as class_name', 'assignments.description as description')
                              ->join('courses','courses.id','=','assignments.course_id')
                              ->join('sections','sections.id','=','assignments.section_id')
                              ->join('subjects','subjects.id','=','assignments.subject_id')
                             ->join('assign_subjects','subjects.id','=','assign_subjects.subject_id')
                                  ->where('assign_subjects.teacher_id', get_teacher_id())
                                  ->where('assignments.session_id', get_option('academic_years'))
                                  ->where('assignments.id', $id)
                              ->orderBy('assignments.id', 'DESC')
                              ->first();

         return view('backend.private.teacher.assignments.assignment-edit', compact('assignment'));
     }

     public function show_assignment($id)
     {
         $assignment = \App\Models\Assignment::select('*','assignments.id AS id', 'courses.title as class_name', 'assignments.title as title', 'assignments.description as description')
                              ->join('courses','courses.id','=','assignments.course_id')
                              ->join('sections','sections.id','=','assignments.section_id')
                              ->join('subjects','subjects.id','=','assignments.subject_id')
                             ->join('assign_subjects','subjects.id','=','assign_subjects.subject_id')
                                  ->where('assign_subjects.teacher_id', get_teacher_id())
                                  ->where('assignments.session_id', get_option('academic_years'))
                                  ->where('assignments.id', $id)
                              ->orderBy('assignments.id', 'DESC')
                              ->first();

         return view('backend.private.teacher.assignments.assignment-show', compact('assignment'));
     }

     public function update_assignment(Request $request, $id)
     {
         $this->validate($request, [
             'title' => 'required|string|max:191',
             'description' => 'nullable|string',
             'deadline' => 'required|date_format:Y-m-d H:i:s',
             'course_id' => 'required',
             'section_id' => 'required',
             'subject_id' => 'required',
             'file' => 'nullable',
             'file_2' => 'nullable',
             'file_3' => 'nullable',
             'file_4' => 'nullable',
         ]);

         $assignment = \App\Models\Assignment::find($id);
 		 $assignment->session_id = get_option("academic_years");
         $assignment->title = $request->title;
         $assignment->description = $request->description;
         $assignment->deadline = $request->deadline;
         $assignment->course_id = $request->course_id;
         $assignment->section_id = $request->section_id;
         $assignment->subject_id = $request->subject_id;

         if($request->hasFile('file')){
             $file = $request->file('file');
             $file_name = Str::uuid() . '.' .$file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/', $file_name);
             $assignment->file = $file_name;
         }
         if($request->hasFile('file_2')){
             $file = $request->file('file_2');
             $file_name = Str::uuid() . '.' .$file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/', $file_name);
             $assignment->file_2 = $file_name;
         }
         if($request->hasFile('file_3')){
             $file = $request->file('file_3');
             $file_name = Str::uuid() . '.' .$file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/', $file_name);
             $assignment->file_3 = $file_name;
         }
         if($request->hasFile('file_4')){
             $file = $request->file('file_4');
             $file_name = Str::uuid() . '.' .$file->getClientOriginalExtension();
             $file->move('frontend/images/assignments/', $file_name);
             $assignment->file_4 = $file_name;
         }

         $assignment->update();

         return redirect('dashboard/teacher/assignments')->with('success', 'Information has been updated');
     }

     public function destroy_assignment($id)
     {
         $assignment = \App\Models\Assignment::find($id);
         $assignment->delete();

         return redirect('dashboard/teacher/assignments')->with('success', 'Information has been deleted');
     }

     public function assign_student()
     {
         $assignments = \App\Models\Assignment::select('*','assignments.id AS id')
                              ->join('courses','courses.id','=','assignments.course_id')
                              ->join('sections','sections.id','=','assignments.section_id')
                              ->join('subjects','subjects.id','=','assignments.subject_id')
                              ->join('assign_subjects','subjects.id','=','assign_subjects.subject_id')
                                  ->where('assign_subjects.teacher_id', get_teacher_id())
                                  ->where('assignments.session_id', get_option('academic_years'))
                              ->orderBy('assignments.id', 'DESC')
                              ->get();

         return view('backend.private.teacher.assign.assignment-list', compact('assignments'));
     }

     public function assigned_student($id)
     {
         $assignment = Assignment::select('*', 'assignments.id')
                                ->join('courses', 'courses.id', '=', 'assignments.course_id')
                                ->join('sections', 'sections.id', '=', 'assignments.section_id')
                                ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                                ->join('assign_subjects', 'assign_subjects.subject_id', '=', 'assignments.subject_id')
                                ->where('assign_subjects.teacher_id', get_teacher_id())
                                ->where('assignments.id', $id)
                                ->where('assignments.session_id', get_option('academic_years'))
                                ->first();

         $files = \App\Models\AssignStudent::select('*', 'assign_students.created_at', 'assign_students.updated_at')
                                        ->join('assignments', 'assignments.id', '=', 'assign_students.topic_id')
                                        ->join('assign_subjects', 'assign_subjects.subject_id', '=', 'assignments.subject_id')
                                        ->join('sections', 'sections.id', '=', 'assign_subjects.section_id')
                                        ->join('courses', 'courses.id', '=', 'sections.course_id')
                                        ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                                        ->join('students', 'students.id', '=', 'assign_students.student_id')
                                        ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                                        ->where('assign_subjects.teacher_id', get_teacher_id())
                                        ->where('assign_students.topic_id', $id)
                                        ->where('assignments.session_id', get_option('academic_years'))
                                        ->where('student_sessions.session_id', get_option('academic_years'))
                                        ->get();

        return view('backend.private.teacher.assign.student-list', compact('files'));
     }

     public function show_assigned_student($assignmentid, $studentid)
     {
         $assignment = Assignment::select('*', 'assignments.id')
                                ->join('courses', 'courses.id', '=', 'assignments.course_id')
                                ->join('sections', 'sections.id', '=', 'assignments.section_id')
                                ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
                                ->join('assign_subjects', 'assign_subjects.subject_id', '=', 'assignments.subject_id')
                                ->where('assign_subjects.teacher_id', get_teacher_id())
                                ->where('assignments.id', $assignmentid)
                                ->where('assignments.session_id', get_option('academic_years'))
                                ->first();

         $files = \App\Models\StudentAssignment::select('*', 'student_assignments.id As id', 'student_assignments.student_id', 'student_assignments.assignment_id')
                                     ->join('students', 'students.id', '=', 'student_assignments.student_id')
                                     ->join('student_sessions', 'student_sessions.student_id', '=', 'student_assignments.student_id')
                                     ->join('assignments', 'assignments.id', '=', 'student_assignments.assignment_id')
                                     ->join('assign_subjects', 'assign_subjects.subject_id', '=', 'assignments.subject_id')
                                     ->join('sections', 'sections.id', '=', 'assign_subjects.section_id')
                                     ->where('student_assignments.student_id', $studentid)
                                     ->where('assign_subjects.teacher_id', get_teacher_id())
                                     ->where('student_sessions.session_id', get_option('academic_years'))
                                     ->where('assignments.session_id', get_option('academic_years'))
                                     ->where('student_assignments.assignment_id', $assignmentid)->get();
        $id = $assignmentid;
        return view('backend.private.teacher.assign.studentfile-list', compact('files', 'id'));
     }

     public function destory_assigned_student($id)
     {
         $files = \App\Models\AssignStudent::find($id)->delete();

         return redirect()->back()->with('success', 'Information has been deleted');
     }

     public function get_teacher_subject(Request $request)
     {
         $results = Subject::join("assign_subjects","subjects.id","assign_subjects.subject_id")
                           ->select('subjects.*')
                               ->where("assign_subjects.teacher_id", get_teacher_id())
                               ->where("assign_subjects.section_id", $request->section_id)
                           ->where("subjects.course_id", $request->course_id)
                            ->get();

        $subjects = '';
          $subjects .= '<option value="">'.'Select One'.'</option>';
          foreach($results as $data){
              $subjects .= '<option value="'.$data->id.'">'.$data->subject_name.'</option>';
          }
          return $subjects;
  	}

    public function my_subjects($course_id = '')
    {
        $subjects = \App\Models\AssignSubject::select('*', 'assign_subjects.id')
                                    ->join('subjects', 'subjects.id', '=', 'assign_subjects.subject_id')
                                    ->join('courses', 'courses.id', '=', 'subjects.course_id')
                                    ->join('sections', 'sections.id', '=', 'assign_subjects.section_id')
                                    ->join('teachers', 'teachers.id', '=', 'assign_subjects.teacher_id')
                                    ->where("assign_subjects.teacher_id", get_teacher_id())
                                    ->get();

        $teacher = \App\Models\AssignSubject::where('teacher_id', get_teacher_id())->first();

         return view('backend.private.teacher.subject',compact('subjects', 'teacher', 'course_id'));
    }

    public function my_students($course_id = '', $section_id = '')
    {
        $teacher = \App\Models\AssignSubject::select('*', 'assign_subjects.id as id')
                                        ->join('sections', 'sections.id', '=', 'assign_subjects.section_id')
                                        ->where('assign_subjects.teacher_id', get_teacher_id())->first();
        if (is_null($teacher)) {
            $subjects = '';
            $teacher = '';
            $course_id = '';
            $section_id = '';
            return view('backend.private.teacher.subject',compact('subjects', 'teacher', 'course_id', 'section_id'));
        }else {
            $subjects = \App\Models\Student::select('*', 'students.id')
                                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                                    ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
                                    ->join('courses', 'courses.id', '=', 'student_sessions.course_id')
                                            ->where('student_sessions.course_id', $teacher->course_id)
                                            ->where('student_sessions.section_id', $teacher->section_id)
                                        ->get();

            return view('backend.private.teacher.student',compact('subjects', 'teacher', 'course_id', 'section_id'));
        }

    }
}
