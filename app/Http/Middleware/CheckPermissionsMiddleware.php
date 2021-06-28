<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Current user
        $currentUser = $request->user();

        // Current Action Name
        $currentActionName = $request->route()->getActionName();
        list($controller, $method) = explode('@', $currentActionName);
        $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);
        $crudPermissionsMap = [
                'crud' => ['index', 'change_session', 'get_students', 'get_subject', 'get_section', 'search', 'class', 'manage', 'store', 'show', 'create', 'get_parents', 'get_subjects', 'promote', 'assign_list', 'assign_student', 'show_assigned_student', 'destory_assigned_student', 'student_attendance', 'student_attendance_save', 'staff_attendance', 'staff_attendance_save', 'exam_schedule', 'store_exam_attendance', 'exam_attendance', 'store_exam_schedule', 'get_exam', 'get_teacher_subject', 'student_ranks', 'view_marks', 'income', 'expense', 'add_expense', 'add_income', 'student_attendance_report', 'staff_attendance_report', 'get_users', 'calendar', 'restore', 'forceDestroy', 'send', 'detail', 'setting', 'history', 'student_id_card', 'exam_report', 'progress_card', 'class_routine', 'exam_routine', 'income_report', 'expense_report', 'account_balance', 'logo_update', 'meta_update', 'office_store', 'social_store', 'bank_accounts', 'my_profile', 'my_student', 'my_subjects', 'my_students', 'class_schedule', 'mark_register', 'create_mark', 'store_mark', 'assignments', 'create_assignment', 'store_assignment', 'edit_assignment', 'show_assignment', 'update_assignment', 'destroy_assignment', 'get_teacher_subject', 'assign_student', 'assigned_student', 'my_friends', 'my_invoice', 'view_invoice', 'invoice_payment', 'paypal', 'stripe_payment', 'payment_history', 'esewa_payment', 'payment_requests', 'payment_request_destroy', 'my_syllabus', 'view_syllabus', 'my_assignment', 'view_assignment', 'submit_assignment', 'store_assignment', 'sharefile', 'my_children', 'children_attendance', 'introduction', 'introduction_store', 'director', 'facility', 'placement', 'objective', 'reply', 'backup_database', 'leave_application_edit', 'leave_application_create', 'leave_application_show', 'leave_application_store', 'leave_application_cancel', 'leave_application_update', 'leave_application_index', 'receive', 'receive_edit'
            ]
        ];

        $classesMap = [
            // Admin
            'Academic\AssignSubject' => 'admin-assign-subject',
            'Academic\ClassRoutine' => 'admin-class-routine',
            'Academic\Section' => 'admin-section',
            'Academic\Subject' => 'admin-subject',
            'Academic\Syllabus' => 'admin-syllabus',
            'Application\Application' => 'admin-application-request',
            'Assignment\Assignment' => 'admin-assignment',
            'Blog\Blog' => 'admin-blog',
            'Blog\Category' => 'admin-blog-category',
            'Blog\Comment' => 'admin-blog-comment',
            'Course\Course' => 'admin-course',
            'Course\Category' => 'admin-course-category',
            'Element\Benefit' => 'admin-benefit',
            'Element\Download' => 'admin-download',
            'Element\FacultyCategory' => 'admin-faculty-category',
            'Element\FacultyMember' => 'admin-faculty-member',
            'Element\Folder' => 'admin-folder',
            'Element\Gallery' => 'admin-gallery',
            'Element\Journey' => 'admin-journey',
            'Element\Plugins' => 'admin-plugins',
            'Element\Settings' => 'admin-settings',
            'Element\Slider' => 'admin-slider',
            'Element\Testimonial' => 'admin-testimonial',
            'Envelope\Faq' => 'admin-faq',
            'Event\Event' => 'admin-event',
            'Event\EventCandidate' => 'admin-event-candidate',
            'Event\EventSpeaker' => 'admin-event-speaker',
            'Exam\Exam' => 'admin-exam',
            'Job\Job' => 'admin-job',
            'Job\Application' => 'admin-job-application',
            'Mark\Grade' => 'admin-grade',
            'Mark\Mark' => 'admin-mark',
            'Mark\MarkDistribution' => 'admin-mark-distribution',
            'Notice\Notice' => 'admin-notice',
            'Pages\About' => 'admin-about',
            'ShareFile\ShareFile' => 'admin-sharefile',
            'User\User' => 'admin-user',
            'Utility\AcademicYear' => 'admin-academic-year',
            'Utility\Picklist' => 'admin-picklist',
            'Utility\Utility' => 'admin-utility',

            // Reception
            'Appointment\Appointment' => 'admin-appointment',
            'Notification\Email' => 'admin-email',
            'Notification\Contact' => 'admin-contact',
            'Course\Comment' => 'admin-course-comments',
            'Course\Application' => 'admin-course-application',
            'Attendance\Attendance' => 'admin-attendance',
            'FrontDesk\Complaint' => 'admin-complaint',
            'FrontDesk\Dispatch' => 'admin-dispatch',
            'FrontDesk\GeneralCall' => 'admin-general-calls',
            'FrontDesk\Visitor' => 'admin-visitors',

            // Accountant
            'Student\Student' => 'admin-student',
            'Teacher\Teacher' => 'admin-teacher',
            'Parent\Parent' => 'admin-parent',
            'Account\Account' => 'admin-account',
            'Transaction\Transaction' => 'admin-transactions',
            'Transaction\PayeePayer' => 'admin-payee-payers',
            'Transaction\Payment' => 'admin-payments',
            'Transaction\Request' => 'admin-requests',
            'Transaction\ChartOfAccount' => 'admin-chart-of-accounts',
            'StudentFee\FeeType' => 'admin-fee-types',
            'StudentFee\Invoice' => 'admin-invoices',
            'StudentFee\StudentPayment' => 'admin-student-payments',
            'Attendance\Report' => 'admin-attendance-report',
            'Report\Report' => 'admin-reports',

            // Teacher
            'Personal\Teacher' => 'teacher', // -only teachers

            // Parent
            'Personal\Parent' => 'parent', // -only parents

            // Student
            'Personal\Student' => 'student', // -only students

        ];

        foreach ($crudPermissionsMap as $permission => $methods) {
          // if the current method is exists in list
          // we'll check the permission
          if (in_array($method, $methods) && isset($classesMap[$controller]))
          {
                $className = $classesMap[$controller];
                // dd($permission.'-' .$className);
                if (! $currentUser->isAbleTo("{$permission}-{$className}"))
                {
                    return redirect()->back()->with('error', "You don't have permission.");
                }
                break;
          }
        }

        return $next($request);
    }
}
