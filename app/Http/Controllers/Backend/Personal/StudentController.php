<?php

namespace App\Http\Controllers\Backend\Personal;

use DB;
use Auth;
use App\Models\InvoicePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function my_profile()
    {
		$student = \App\Models\Student::join('users','users.id','=','students.author_id', 'students.photo as photo')
                     ->join('student_sessions','students.id','=','student_sessions.student_id')
                     ->join('courses','courses.id','=','student_sessions.course_id')
                     ->join('sections','sections.id','=','student_sessions.section_id')
                     ->join('parents','parents.id','=','students.parent_id')
					 ->where('student_sessions.session_id',get_option('academic_years'))
                     ->where('students.id',get_student_id())->first();
        return view('backend.private.student.profile',compact('student'));
    }

    public function my_subjects()
    {
		$student = \App\Models\StudentSession::where("student_id",get_student_id())
								      ->where("session_id", get_option('academic_years'))
									  ->first();

		$subjects = \App\Models\Subject::select('*','subjects.id AS id')
					->join('courses','courses.id','=','subjects.course_id')
					->where('subjects.course_id', $student->course_id)
					->orderBy('subjects.id', 'DESC')
					->get();
        return view('backend.private.student.subject',compact('subjects'));
    }

    public function class_routine()
    {
		$student = \App\Models\StudentSession::where("student_id",get_student_id())
								      ->where("session_id",get_option('academic_years'))
									  ->first();

		$data = array();
        $data['class'] = \App\Models\Course::find($student->course_id);
        $data['section'] = \App\Models\Section::find($student->section_id);
        $data['routine'] = \App\Models\ClassRoutine::getRoutineView($student->course_id, $student->section_id);

		return view('backend.private.student.class_routine',$data);
	}

    public function exam_routine(Request $request, $view=""){
		$class_id = 0;
		$exam_id = "";

		if($view == ""){
			return view('backend.private.student.exam_routine', compact('class_id','exam_id'));
        }else{
			$student = \App\Models\StudentSession::where("student_id",get_student_id())
								      ->where("session_id", get_option('academic_years'))
									  ->first();

			$data = array();
			$data['class_id'] = $student->course_id;
			$data['exam_id'] = $request->exam_id;
			$exam = $request->exam_id;;
			$data['subjects'] = \App\Models\Subject::select('*','exam_schedules.id as schedules_id','subjects.id as subject_id')
								->leftJoin('exam_schedules',function($join) use ($exam) {
									$join->on('subjects.id', '=', 'exam_schedules.subject_id');
									$join->where('exam_schedules.exam_id',$exam);
								})
								->where('subjects.course_id',$student->course_id)
								->get();

			return view('backend.private.student.exam_routine',$data);
		}
	}

    public function progress_card()
    {
		$class_id = 0;
		$section_id = "";
		$exam_id = "";

		$student = \App\Models\StudentSession::where("student_id", get_student_id())
								  ->where("session_id", get_option('academic_years'))
								  ->first();

		$class_id = $student->course_id;
		$section_id = $student->section_id;
		$student_id = $student->student_id;


		$student = DB::table("students")->join('users','users.id','=','students.author_id')
                				 ->join('student_sessions','students.id','=','student_sessions.student_id')
                				 ->join('courses','courses.id','=','student_sessions.course_id')
                				 ->join('sections','sections.id','=','student_sessions.section_id')
                				 ->where('student_sessions.session_id',get_option('academic_years'))
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

		return view('backend.private.student.progress_card', compact('class_id','section_id','student','exams', 'mark_head', 'mark_details', 'subjects'));
	}

    public function my_invoice( $status="unpaid" )
    {
		 $invoices = \App\Models\Invoice::join('students','invoices.student_id','=','students.id')
        							->join('student_sessions','students.id','=','student_sessions.student_id')
        							->join('courses','courses.id','=','student_sessions.course_id')
        							->join('sections','sections.id','=','student_sessions.section_id')
        							->select('invoices.*', 'students.student_name','courses.title','sections.section_name','invoices.id as id')
            							->where('student_sessions.session_id', get_option('academic_years'))
            							->where('invoices.session_id', get_option('academic_years'))
            							->where('invoices.student_id', get_student_id())
            							->where('invoices.status',$status)
        							->orderBy('invoices.id', 'DESC')
        							->get();

        return view('backend.private.student.invoice.list', compact('invoices'));
    }

    public function view_invoice(Request $request,$id)
    {
		$invoice = \App\Models\Invoice::join('students','invoices.student_id','=','students.id')
							->join('student_sessions','students.id','=','student_sessions.student_id')
                            ->join('courses','courses.id','=','student_sessions.course_id')
                            ->join('sections','sections.id','=','student_sessions.section_id')
							->select('invoices.*','students.student_name','courses.title','sections.section_name','invoices.id as id')
							->where('student_sessions.session_id', get_option('academic_years'))
							->where('invoices.session_id', get_option('academic_years'))
							->where('invoices.student_id', get_student_id())
							->where('invoices.id',$id)->first();
		$invoiceItems = \App\Models\InvoiceItem::join("fee_types","invoice_items.fee_id","=","fee_types.id")
		                ->where("invoice_id",$id)->get();

		$transactions = \App\Models\StudentPayment::where("invoice_id",$id)->get();

		if(! $request->ajax()){
		    return view('backend.private.student.invoice.view', compact('invoice','id','invoiceItems','transactions'));
		}else{
			return view('backend.private.student.invoice.modal.view', compact('invoice','id','invoiceItems','transactions'));
		}
    }

    public function invoice_payment($method,$invoice_id){
		if($method == 'paypal'){
			$invoice = \App\Models\Invoice::where("id",$invoice_id)
			                       ->where("student_id",get_student_id())->first();
			return view('backend.private.student.payment_gateway.paypal', compact('invoice'));
		}else if($method == 'stripe'){
			$invoice = \App\Models\Invoice::where("id",$invoice_id)
			                       ->where("student_id",get_student_id())->first();
			return view('backend.private.student.payment_gateway.stripe', compact('invoice'));
		}
	}

    public function payment_requests()
    {
        $transactions = InvoicePayment::select('*', 'invoice_payments.id as id', 'invoice_payments.status as status')
                                    ->join('invoices', 'invoices.id', '=', 'invoice_payments.invoice_id')
                                    ->join('users', 'users.id', '=', 'invoice_payments.user_id')
                                    ->orderBy('invoice_payments.id', 'desc')->get();

        return view('backend.private.student.payments.payment-history', compact('transactions'));
    }

    public function payment_request_destroy($id)
    {
        $transaction = InvoicePayment::find($id);
        if ($transaction->status == 0) {
            $transaction->delete();
        }
        else {
            return redirect()->route('payment_requests.index')->with('error', "You don't have permission");
        }

        return redirect()->route('payment_requests.index')->with('success', 'Information has been deleted');
    }

    public function esewa_payment(Request $request)
    {
        $this->validate($request, [
            'document' => 'required|mimes:pdf,png,jpg,jpeg,PNG,JPG,JPEG,PDF'
        ]);

        if ($request->hasFile('document')) {
            $image = $request->file('document');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/payments', $fileName);
        }
        $payment = new \App\Models\InvoicePayment;
        $payment->invoice_id = $request->invoice_id;
        $payment->user_id = $request->user_id;
        $payment->amount = $request->amount;
        $payment->document = 'payments/' . $fileName;
        $payment->user_type = Auth::user()->roles()->first()->display_name;
        $payment->save();

        $users = \App\Models\User::select('*','users.id AS id')
                            ->join('role_user', 'role_user.user_id', '=', 'users.id')
                            ->orWhere('role_user.role_id', 5)
                            ->orWhere('role_user.role_id', 6)
                            ->orWhere('role_user.role_id', 1)->get();

        foreach ($users as $data) {
            $notification = new \App\Models\Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have one payment notification.';
            $notification->message = Auth::user()->user_name . "has been sent you a request for Payment Review";
            $notification->address = route('transaction_requests.index');
            $notification->save();
        }

        return redirect('dashboard/student/my_invoice')->with('success', 'We review your payment.');
    }

    public function payment_history()
    {
		$studentpayments = \App\Models\StudentPayment::join('invoices','invoices.id','=','student_payments.invoice_id')
								->select('invoices.*','student_payments.*','student_payments.id as id')
								->where('invoices.session_id', get_option('academic_years'))
								->where('invoices.student_id', get_student_id())
								->orderBy('student_payments.id', 'DESC')
								->get();
        return view('backend.private.student.payment_history',compact('studentpayments'));
    }

    public function my_assignment()
	{
		$student = \App\Models\StudentSession::where("student_id",get_student_id())
								  ->where("session_id",get_option('academic_years'))
								  ->first();
        $assignments = \App\Models\Assignment::select('*','assignments.id AS id')
                            ->join('subjects','subjects.course_id','=','assignments.course_id')
							->where('assignments.course_id', $student->course_id)
							->where('assignments.section_id', $student->section_id)
                            ->where('assignments.session_id', get_option('academic_years'))
							->orderBy('assignments.id', 'DESC')
                            ->get();
        return view('backend.private.student.assignments.assignment-list', compact('assignments'));
    }

	public function view_assignment($id)
    {
		$student = \App\Models\StudentSession::where("student_id",get_student_id())
								  ->where("session_id",get_option('academic_years'))
								  ->first();

        $assignment = \App\Models\Assignment::select('*','assignments.id AS id', 'assignments.title as title', 'courses.title as class_name', 'assignments.description as description')
                            ->join('courses','courses.id','=','assignments.course_id')
                            ->join('sections','sections.id','=','assignments.course_id')
                            ->join('subjects','subjects.course_id','=','assignments.course_id')
                            ->where('assignments.id',$id)
							->where('assignments.session_id', get_option('academic_years'))
                            ->where('assignments.course_id',$student->course_id)
							->where('assignments.section_id',$student->section_id)
                            ->first();

        return view('backend.private.student.assignments.assignment-show', compact('assignment'));
    }

    public function assign_student(Request $request)
    {
        $student = \App\Models\Student::where('author_id',Auth::user()->id)->first();
        $this->validate($request, [
            'topic_id' => 'required|numeric',
        ]);

        $assign = \App\Models\StudentAssignment::select('*', 'student_assignments.id AS id')
                                    ->join('assignments', 'assignments.id', '=', 'student_assignments.assignment_id')
                                    ->join('students', 'students.id', '=', 'student_assignments.student_id')
                                    ->where('student_assignments.student_id', get_student_id())
                                    ->where('student_assignments.assignment_id', $request->topic_id)->get();
        if ($assign->count() == '') {
            return redirect()->back()->with('error', 'Please upload some file');
        }
        // dd($assign);
        if ($request->value == 1) {
            $assign = new \App\Models\AssignStudent;
            $assign->student_id = $student->id;
            $assign->topic_id = $request->topic_id;
            $assign->value = $request->value;
            $assign->save();

            return redirect()->back()->with('success', 'You have been Submitted');
        }
        if ($request->value == 0) {
            $assign = \App\Models\AssignStudent::findOrFail($request->assign_id);
            $assign->student_id = $student->id;
            $assign->topic_id = $request->topic_id;
            $assign->value = $request->value;
            $assign->update();

            return redirect()->back()->with('success', 'You have been Unsubmitted');
        }
        if ($request->value1 == 1) {
            // dd($request->toArray());
            $assign = \App\Models\AssignStudent::findOrFail($request->assign_id);
            $assign->student_id = $student->id;
            $assign->topic_id = $request->topic_id;
            $assign->value = $request->value1;
            $assign->update();

            return redirect()->back()->with('success', 'You have been Submitted');
        }

    }

    public function submit_assignment($id)
    {
        $student = \App\Models\StudentSession::where("student_id",get_student_id())
								  ->where("session_id",get_option('academic_years'))
								  ->first();

        if ($student)
        {
            $assignment = \App\Models\Assignment::select('*','assignments.id AS id')
                                        ->join('courses','courses.id','=','assignments.course_id')
                                        ->join('sections','sections.id','=','assignments.section_id')
                                        ->join('subjects','subjects.id','=','assignments.subject_id')
                                        ->where('assignments.id',$id)
                                        ->where('assignments.session_id', get_option('academic_years'))
                                        ->where('assignments.course_id',$student->course_id)
                                        ->where('assignments.section_id',$student->section_id)
                                        ->first();
            if ($assignment)
            {
                $assign = \App\Models\StudentAssignment::select('*', 'student_assignments.id AS id')
                                            ->join('assignments', 'assignments.id', '=', 'student_assignments.assignment_id')
                                            ->join('students', 'students.id', '=', 'student_assignments.student_id')
                                            ->where('student_assignments.assignment_id', $assignment->id)->get();
                if ($assign)
                 {
                    $submit = \App\Models\AssignStudent::select('*', 'assign_students.id AS id')
                                                ->join('assignments', 'assignments.id', '=', 'assign_students.topic_id')
                                                ->join('students', 'students.id', '=', 'assign_students.student_id')
                                                ->where('assign_students.topic_id', $assignment->id)
                                                ->first();
                    // code...
                    if ($submit == '') {
                        $submit = '';
                    }
                    return view('backend.private.student.assignments.assignment-submit', compact('assignment', 'assign', 'submit'));
                }else {
                    return back()->with('error', "You don't have permission");
                }
            }else {
                return back()->with('error', "You don't have permission");
            }

        }else {
            return back()->with('error', "You don't have permission");
        }

    }

    public function store_assignment(Request $request)
    {
        if ($request->file('file_name')) {
            $images = $request->file('file_name');
            foreach($images as $image)
            {
                $new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move('frontend/images/assignments/students/', $new_name);

                $assignment = new \App\Models\StudentAssignment;
                $assignment->student_id = $request->student_id;
                $assignment->assignment_id = $request->assignment_id;
                $assignment->file_name = $new_name;
                $assignment->save();
            }
        }

         return redirect()->back()->with('success', 'Image has been uploaded');
    }

    public function destroy_assignment($id)
    {
        $assign = \App\Models\StudentAssignment::find($id);
        $this->removeImage($assign->file_name);
        $assign->delete();

        return redirect()->back()->with('success', 'Image has been deleted');
    }

    private function removeImage($image)
    {
        if ( ! empty($image))
        {
          $imagePath = 'frontend/images/assignments' . '/' . $image;
          $ext = substr(strrchr($image, '.'), 1);

          if (file_exists($imagePath)) unlink($imagePath);
        }
    }

    public function my_syllabus()
    {
		$student = \App\Models\StudentSession::where("student_id",get_student_id())
								  ->where("session_id",get_option('academic_years'))
								  ->first();

        $syllabus = \App\Models\Syllabus::select('*','syllabus.id AS id')
                            ->join('courses','courses.id','=','syllabus.class_id')
                            ->where('syllabus.class_id',$student->course_id)
							->where('syllabus.session_id', get_option('academic_years'))
							->orderBy('syllabus.id', 'DESC')
                            ->get();

        return view('backend.private.student.syllabus.syllabus-list', compact('syllabus'));
    }

	public function view_syllabus($id)
    {
		$student = \App\Models\StudentSession::where("student_id", get_student_id())
								  ->where("session_id",get_option('academic_years'))
								  ->first();

        $syllabus = \App\Models\Syllabus::select('*','syllabus.id AS id')
                            ->join('courses','courses.id','=','syllabus.class_id')
                            ->where('syllabus.class_id',$student->course_id)
							->where('syllabus.id',$id)
                            ->where('syllabus.session_id', get_option('academic_years'))
							->first();

        return view('backend.private.student.syllabus.syllabus-view', compact('syllabus'));
    }

    public function sharefile()
    {
        $class = \App\Models\StudentSession::where('student_id', get_student_id())->first();

        $files = \App\Models\ShareFile::select('*', 'share_files.id AS id')
                            ->join('student_sessions', 'student_sessions.session_id', '=', 'share_files.session_id')
                            ->join('courses', 'courses.id', '=', 'student_sessions.course_id')
                            ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
                            ->join('subjects', 'subjects.id', '=', 'share_files.subject_id')
                            ->where('share_files.course_id', $class->course_id)
                            ->where('share_files.section_id', $class->section_id)
                            ->where('student_sessions.student_id', get_student_id())
                            ->where('share_files.session_id', get_option('academic_years'))->get();

       return view('backend.private.student.sharefiles.sharefile-list', compact('files'));
    }
}
