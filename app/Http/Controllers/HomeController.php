<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (get_auth() == 'teacher') {
            $method = 'Teacher_dashboard';
            return $this->$method();
        }
        if (get_auth() == 'student') {
            $method = 'Student_dashboard';
            return $this->$method();
        }
        
        $month = date('m');
		$year = date('Y');

		$data = array();
		$data['currency'] = get_option('currency_symbol');
		$data['total_student'] = \App\Models\Student::join("student_sessions","students.id","student_sessions.student_id")
		                                     ->selectRaw("COUNT(students.id) as total_student")
		                                     ->where('students.status', 0)
											 ->where("student_sessions.session_id",get_option("academic_years"))->first()->total_student;

		$data['student_payments'] = \App\Models\StudentPayment::selectRaw("IFNULL(SUM(amount),0) as total")
		                                                ->whereMonth("date",$month)
													    ->whereYear("date",$year)
														->first()->total;

		$data['monthly_income'] = \App\Models\Transaction::selectRaw("IFNULL(SUM(amount),0) as total")
		                                                ->where("dr_cr","cr")
														->whereMonth("trans_date",$month)
													    ->whereYear("trans_date",$year)
														->first()->total;

		$data['monthly_expense'] = \App\Models\Transaction::selectRaw("IFNULL(SUM(amount),0) as total")
		                                                ->where("dr_cr","dr")
														->whereMonth("trans_date",$month)
													    ->whereYear("trans_date",$year)
														->first()->total;

        $data['yearly_income'] = $this->yearly_income();
		$data['yearly_expense'] = $this->yearly_expense();

        return view('backend.dashboard.index', $data);
    }

    private function Student_dashboard(){
		$month = date('m');
		$year = date('Y');
		$data = array();

		$data['total_paid'] = \App\Models\Invoice::join("student_payments","student_payments.invoice_id","invoices.id")
										    ->where("student_id",get_student_id())
		                                    ->where("session_id",get_option("academic_years"))
											->selectRaw("IFNULL(SUM(student_payments.amount),0) as total_paid")
											->first()->total_paid;

		$data['paid_invoice'] = \App\Models\Invoice::where("student_id",get_student_id())
		                                    ->where("status","paid")
		                                    ->where("session_id",get_option("academic_years"))
											->selectRaw("COUNT(id) as total_invoice")
											->first()->total_invoice;

		$data['unpaid_invoice'] = \App\Models\Invoice::where("student_id",get_student_id())
		                                    ->where("status","unpaid")
		                                    ->where("session_id",get_option("academic_years"))
											->selectRaw("COUNT(id) as total_invoice")
											->first()->total_invoice;

		return view('backend.dashboard.index',$data);
	}

    private function Teacher_dashboard()
    {
		$month = date('m');
		$year = date('Y');
		$data = array();

        $teacher = \App\Models\AssignSubject::select('*', 'assign_subjects.id as id')
                                        ->join('sections', 'sections.id', '=', 'assign_subjects.section_id')
                                        ->where('assign_subjects.teacher_id', get_teacher_id())->first();

		$data['total_student'] = \App\Models\Student::join("student_sessions","students.id","student_sessions.student_id")
		                                     ->selectRaw("COUNT(students.id) as total_student")
                                             ->where('student_sessions.course_id', $teacher->course_id)
                                             ->where('student_sessions.section_id', $teacher->section_id)
											 ->where("student_sessions.session_id", get_option("academic_years"))->first()->total_student;

		$data['my_subject_count'] = \App\Models\Subject::join("assign_subjects","subjects.id","assign_subjects.subject_id")
		                                    ->where("assign_subjects.teacher_id",get_teacher_id())
											->selectRaw(" COUNT(subjects.id) as my_subject_count")
											->first()->my_subject_count;


		return view('backend.dashboard.index',$data);
	}

    private function yearly_income(){
		$date = date("Y-m-d");
		$income  = "[";
		$income_query = DB::select("SELECT m.month, IFNULL(SUM(t.amount),0) as income_amount
		FROM ( SELECT 1 AS MONTH UNION SELECT 2 AS MONTH UNION SELECT 3 AS MONTH
		UNION SELECT 4 AS MONTH UNION SELECT 5 AS MONTH UNION SELECT 6 AS MONTH
		UNION SELECT 7 AS MONTH UNION SELECT 8 AS MONTH UNION SELECT 9 AS MONTH
		UNION SELECT 10 AS MONTH UNION SELECT 11 AS MONTH UNION SELECT 12 AS MONTH ) AS m
		LEFT JOIN transactions t ON m.month = MONTH(t.trans_date) AND YEAR(t.trans_date)=YEAR('$date')
		AND t.trans_type='income' GROUP BY m.month ORDER BY m.month ASC");
		foreach($income_query as $row){
			$income .=$row->income_amount.",";
		}
		return $income."]";
	}

	private function yearly_expense(){
		$date = date("Y-m-d");
		$expense  = "[";
		$expense_query = DB::select("SELECT m.month, IFNULL(SUM(t.amount),0) as expense_amount
		FROM ( SELECT 1 AS MONTH UNION SELECT 2 AS MONTH UNION SELECT 3 AS MONTH
		UNION SELECT 4 AS MONTH UNION SELECT 5 AS MONTH UNION SELECT 6 AS MONTH
		UNION SELECT 7 AS MONTH UNION SELECT 8 AS MONTH UNION SELECT 9 AS MONTH
		UNION SELECT 10 AS MONTH UNION SELECT 11 AS MONTH UNION SELECT 12 AS MONTH ) AS m
		LEFT JOIN transactions t ON m.month = MONTH(t.trans_date) AND YEAR(t.trans_date)=YEAR('$date')
		AND t.trans_type='expense' GROUP BY m.month ORDER BY m.month ASC");
		foreach($expense_query as $row){
			$expense .=$row->expense_amount.",";
		}

		return $expense."]";
	}
}
