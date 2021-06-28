<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Frontend\Pages\HomeController::class, 'index'])->name('pages.home');

// About page
Route::get('introduction', [App\Http\Controllers\Frontend\Pages\AboutController::class, 'introduction'])->name('pages.introduction');
Route::get('message-from-director', [App\Http\Controllers\Frontend\Pages\AboutController::class, 'director'])->name('pages.director');
Route::get('our-objective-mission-and-vision', [App\Http\Controllers\Frontend\Pages\AboutController::class, 'objective'])->name('pages.objective');
Route::get('facility-and-resource', [App\Http\Controllers\Frontend\Pages\AboutController::class, 'facility'])->name('pages.facility');
Route::get('placement-and-support-unit', [App\Http\Controllers\Frontend\Pages\AboutController::class, 'placement'])->name('pages.placement');

Route::get('team-members', [App\Http\Controllers\Frontend\Pages\AboutController::class, 'team'])->name('pages.team');
Route::get('team-members/{team_category}/{team_member}', [App\Http\Controllers\Frontend\Faculty\FacultyMemberController::class, 'show'])->name('team_member.show');

// Pages
Route::get('form-appointment', [App\Http\Controllers\Frontend\Form\FormController::class, 'appointment'])->name('form.appointment');
Route::post('form-appointment/store', [App\Http\Controllers\Frontend\Form\FormController::class, 'store'])->name('appointment.store');

// Download
Route::get('downloads', [App\Http\Controllers\Frontend\Pages\DownloadController::class, 'index'])->name('pages.download');

// Admission
Route::get('admissions', [App\Http\Controllers\Frontend\Admission\AdmissionController::class, 'index'])->name('pages.admission');
Route::post('admissions', [App\Http\Controllers\Frontend\Admission\AdmissionController::class, 'store'])->name('admission.store');

// Jobs
Route::get('jobs', [App\Http\Controllers\Frontend\Jobs\JobController::class, 'index'])->name('pages.job');
Route::get('jobs/{job}', [App\Http\Controllers\Frontend\Jobs\JobController::class, 'show'])->name('job.show');
Route::get('jobs/{job}/apply', [App\Http\Controllers\Frontend\Jobs\JobController::class, 'create'])->name('job.create');
Route::post('jobs/{job}/apply', [App\Http\Controllers\Frontend\Jobs\JobController::class, 'store'])->name('job.store');

// Faq
Route::get('faqs', [App\Http\Controllers\Frontend\Pages\FaqController::class, 'index'])->name('pages.faq');
Route::get('faqs/askquestion', [App\Http\Controllers\Frontend\Pages\FaqController::class, 'create'])->name('faq.create');
Route::post('faqs', [App\Http\Controllers\Frontend\Pages\FaqController::class, 'store'])->name('faq.store');

// Course
Route::get('courses', [App\Http\Controllers\Frontend\Course\CourseController::class, 'index'])->name('pages.course');
Route::get('courses/{course}', [App\Http\Controllers\Frontend\Course\CourseController::class, 'show'])->name('course.show');
Route::get('courses/category/{coursecategory}', [App\Http\Controllers\Frontend\Course\CourseController::class, 'category'])->name('course.category');

Route::post('courses/comments', [App\Http\Controllers\Frontend\Course\CommentController::class, 'store'])->name('course.comment');
Route::get('courses/{course}/{comment}/reply', [App\Http\Controllers\Frontend\Course\CommentController::class, 'index'])->name('course.index');
Route::post('courses/comments/reply', [App\Http\Controllers\Frontend\Course\CommentController::class, 'reply'])->name('course.reply');

Route::get('courses/{course}/register', [App\Http\Controllers\Frontend\Course\RegisterController::class, 'index'])->name('course.register');
Route::post('courses/{course}/register', [App\Http\Controllers\Frontend\Course\RegisterController::class, 'store'])->name('course.store');

// Events
Route::get('events', [App\Http\Controllers\Frontend\Event\EventController::class, 'index'])->name('pages.event');
Route::get('events/{event}', [App\Http\Controllers\Frontend\Event\EventController::class, 'show'])->name('event.show');

Route::get('events/{event}/candidate', [App\Http\Controllers\Frontend\Event\CandidateController::class, 'index'])->name('event.register');
Route::post('events/{event}/candidate', [App\Http\Controllers\Frontend\Event\CandidateController::class, 'store'])->name('event.store');

// Notices
Route::get('notices', [App\Http\Controllers\Frontend\Notice\NoticeController::class, 'index'])->name('pages.notice');
Route::get('notices/{notice}', [App\Http\Controllers\Frontend\Notice\NoticeController::class, 'show'])->name('notice.show');

Route::post('notices/comments', [App\Http\Controllers\Frontend\Notice\CommentController::class, 'store'])->name('notice.comment');
Route::get('notices/{notice}/{comment}/reply', [App\Http\Controllers\Frontend\Notice\CommentController::class, 'index'])->name('notice.index');
Route::post('notices/comments/reply', [App\Http\Controllers\Frontend\Notice\CommentController::class, 'reply'])->name('notice.reply');

// Gallery
Route::get('galleries', [App\Http\Controllers\Frontend\Pages\GalleryController::class, 'index'])->name('pages.gallery');

// News
Route::get('news', [App\Http\Controllers\Frontend\News\NewsController::class, 'index'])->name('pages.news');
Route::get('news/{news}', [App\Http\Controllers\Frontend\News\NewsController::class, 'show'])->name('blog.show');
Route::get('news/category/{category}', [App\Http\Controllers\Frontend\News\NewsController::class, 'category'])->name('category.show');
Route::get('news/tags/{tag}', [App\Http\Controllers\Frontend\News\NewsController::class, 'tags'])->name('tag.show');

Route::post('comments', [App\Http\Controllers\Frontend\News\CommentController::class, 'store'])->name('blog.comment');
Route::get('news/{news}/{comment}/reply', [App\Http\Controllers\Frontend\News\CommentController::class, 'index'])->name('comment.index');
Route::post('news/comments/reply', [App\Http\Controllers\Frontend\News\CommentController::class, 'reply'])->name('comment.reply');

// Contact
Route::get('contact-us', [App\Http\Controllers\Frontend\Pages\ContactController::class, 'index'])->name('pages.contact');
Route::post('contact', [App\Http\Controllers\Frontend\Pages\ContactController::class, 'store'])->name('contact.store');

Auth::routes(['verify' => true]);

// Support
    Route::get('dashboard/students/get_students/{class_id}/{section_id}', [App\Http\Controllers\Backend\Support\SupportController::class, 'get_students'])->middleware(['web', 'auth']);
    Route::post('dashboard/subjects/subject', [App\Http\Controllers\Backend\Support\SupportController::class, 'get_subject'])->middleware(['web', 'auth']);
    Route::post('dashboard/sections/section', [App\Http\Controllers\Backend\Support\SupportController::class, 'get_section'])->middleware(['web', 'auth']);
    Route::get('dashboard/student/parents/get_parents/list', [App\Http\Controllers\Backend\Support\SupportController::class, 'get_parents'])->middleware(['web', 'auth']);
    Route::get('dashboard/users/parents/create', [App\Http\Controllers\Backend\Support\SupportController::class, 'create'])->name('user_parents.create')->middleware(['web', 'auth']);
    Route::post('dashboard/users/parents', [App\Http\Controllers\Backend\Support\SupportController::class, 'store'])->name('user_parents.store')->middleware(['web', 'auth']);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'web', 'check-permissions', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('administration/change_session/{session_id}', [App\Http\Controllers\Backend\Utility\UtilityController::class, 'change_session'])->name('general_settings.update');

    

    // Academic Backend Route
    Route::get('sections/class/{class_id}', [App\Http\Controllers\Backend\Academic\SectionController::class, 'index'])->name('sections.index');
    Route::resource('sections', App\Http\Controllers\Backend\Academic\SectionController::class);
    Route::resource('syllabus', App\Http\Controllers\Backend\Academic\SyllabusController::class);
    Route::get('subjects/class/{class_id}', [App\Http\Controllers\Backend\Academic\SubjectController::class, 'index'])->name('subjects.index');
    Route::resource('/subjects', App\Http\Controllers\Backend\Academic\SubjectController::class);

    // Assign Subject Route
    Route::post('assignsubjects/search', [App\Http\Controllers\Backend\Academic\AssignSubjectController::class, 'search']);
    Route::resource('assignsubjects', App\Http\Controllers\Backend\Academic\AssignSubjectController::class);

    // Class Routine
    Route::get('class_routines', [App\Http\Controllers\Backend\Academic\ClassRoutineController::class, 'index'])->name('class_routines.index');
    Route::get('class_routines/class/{class_id}', [App\Http\Controllers\Backend\Academic\ClassRoutineController::class, 'class'])->name('class_routines.index');
    Route::get('class_routines/manage/{class_id}/{section_id}', [App\Http\Controllers\Backend\Academic\ClassRoutineController::class, 'manage'])->name('class_routines.edit');
    Route::post('class_routines/store', [App\Http\Controllers\Backend\Academic\ClassRoutineController::class, 'store'])->name('class_routines.create');
    Route::get('class_routines/show/{class_id}/{section_id}', [App\Http\Controllers\Backend\Academic\ClassRoutineController::class, 'show'])->name('class_routines.index');

    //Message Controller
    Route::get('message/compose', [App\Http\Controllers\Backend\Message\MessageController::class, 'create'])->name('messages.compose');
    Route::get('message/outbox', [App\Http\Controllers\Backend\Message\MessageController::class, 'send_items'])->name('messages.outbox');
    Route::get('message/inbox', [App\Http\Controllers\Backend\Message\MessageController::class, 'inbox_items'])->name('messages.inbox');
    Route::get('message/outbox/{id}', [App\Http\Controllers\Backend\Message\MessageController::class, 'show_outbox'])->name('messages.show_outbox');
    Route::get('message/inbox/{id}', [App\Http\Controllers\Backend\Message\MessageController::class, 'show_inbox'])->name('messages.show_inbox');
    Route::post('message/send', [App\Http\Controllers\Backend\Message\MessageController::class, 'send'])->name('messages.send');

    // Parent
    Route::resource('parents', App\Http\Controllers\Backend\Parent\ParentController::class);
    Route::get('dashboard/parents/get_parents/list', [App\Http\Controllers\Backend\Parent\ParentController::class, 'get_parents']);

    // Student Dashboard
    Route::get('students/get_subjects/{course_id}', [App\Http\Controllers\Backend\Student\StudentController::class, 'get_subjects']);
    Route::get('students/class/{class_id?}', [App\Http\Controllers\Backend\Student\StudentController::class, 'class'])->name('students.index');
    Route::match(['get','post'],'students/promote/{step?}', [App\Http\Controllers\Backend\Student\StudentController::class, 'promote'])->name('students.promote');
    Route::resource('students', App\Http\Controllers\Backend\Student\StudentController::class);

    // Teacher Dashboard
    Route::resource('teachers', App\Http\Controllers\Backend\Teacher\TeacherController::class);

    // Assignment
    Route::resource('/assignments', App\Http\Controllers\Backend\Assignment\AssignmentController::class);
    Route::get('assignment/student/class/{class_id?}', [App\Http\Controllers\Backend\Assignment\AssignmentController::class, 'class'])->name('assignments.student');
    Route::get('assignment/student', [App\Http\Controllers\Backend\Assignment\AssignmentController::class, 'assign_list'])->name('assignments.student');
    Route::get('assignment/student/{id}', [App\Http\Controllers\Backend\Assignment\AssignmentController::class, 'assign_student'])->name('assignments.list');
    Route::get('assignment/student/{assignmentid}/{studentid}', [App\Http\Controllers\Backend\Assignment\AssignmentController::class, 'show_assigned_student'])->name('assigned.student_show');
    Route::delete('assignment/student/{id}', [App\Http\Controllers\Backend\Assignment\AssignmentController::class, 'destory_assigned_student'])->name('destory.assigned_student');

    // Share File
    Route::get('sharefiles/class/{class_id?}', [App\Http\Controllers\Backend\ShareFile\ShareFileController::class, 'index'])->name('sharefiles.index');
    Route::resource('sharefiles', App\Http\Controllers\Backend\ShareFile\ShareFileController::class);

    // Attendance Controller
    Route::match(['get','post'],'student/attendance', [App\Http\Controllers\Backend\Attendance\AttendanceController::class, 'student_attendance'])->name('student_attendance.create');
    Route::post('student/attendance/save', [App\Http\Controllers\Backend\Attendance\AttendanceController::class, 'student_attendance_save'])->name('student_attendance.save');
    Route::match(['get','post'], 'staff/attendance', [App\Http\Controllers\Backend\Attendance\AttendanceController::class, 'staff_attendance'])->name('staff_attendance.create');
    Route::post('staff/attendance/save', [App\Http\Controllers\Backend\Attendance\AttendanceController::class, 'staff_attendance_save'])->name('staff_attendance.save');

    // Exam Controller
    Route::match(['get', 'post'],'exams/schedule/{type?}', [App\Http\Controllers\Backend\Exam\ExamController::class, 'exam_schedule'])->name('exams.view_schedule');
    Route::match(['get', 'post'],'exams/attendance', [App\Http\Controllers\Backend\Exam\ExamController::class, 'exam_attendance'])->name('exams.store_exam_attendance');
    Route::post('exams/store_exam_attendance', [App\Http\Controllers\Backend\Exam\ExamController::class, 'store_exam_attendance'])->name('exams.store_exam_attendance');
    Route::post('exams/store_schedule', [App\Http\Controllers\Backend\Exam\ExamController::class, 'store_exam_schedule'])->name('exams.store_exam_schedule');
    Route::post('exams/get_exam', [App\Http\Controllers\Backend\Exam\ExamController::class, 'get_exam']);
    Route::post('exams/get_subject', [App\Http\Controllers\Backend\Exam\ExamController::class, 'get_subject']);
    Route::post('exams/get_teacher_subject', [App\Http\Controllers\Backend\Exam\ExamController::class, 'get_teacher_subject']);
    Route::resource('exams', App\Http\Controllers\Backend\Exam\ExamController::class);

    //Grade Controller
    Route::resource('grades', App\Http\Controllers\Backend\Mark\GradeController::class);

    //Mark Distribution Controller
    Route::resource('mark_distributions', App\Http\Controllers\Backend\Mark\MarkDistributionController::class);

    //Mark Register
    Route::match(['get', 'post'],'marks/rank/{class?}', [App\Http\Controllers\Backend\Mark\MarkController::class, 'student_ranks'])->name('marks.view_student_rank');
    Route::match(['get', 'post'],'marks/create', [App\Http\Controllers\Backend\Mark\MarkController::class, 'create'])->name('marks.create');
    Route::post('marks/store', [App\Http\Controllers\Backend\Mark\MarkController::class, 'store'])->name('marks.store');
    Route::match(['get', 'post'],'marks/{class?}', [App\Http\Controllers\Backend\Mark\MarkController::class, 'index'])->name('marks.index');
    Route::get('marks/view/{student_id}/{class_id}', [App\Http\Controllers\Backend\Mark\MarkController::class, 'view_marks'])->name('marks.show');

    //Bank & Cash Account Controller
    Route::resource('accounts', App\Http\Controllers\Backend\Account\AccountController::class);

    //Chart Of Accounts Controller
    Route::resource('chart_of_accounts', App\Http\Controllers\Backend\Transaction\ChartOfAccountController::class);

    //Payment Method Controller
    Route::resource('payment_methods', App\Http\Controllers\Backend\Transaction\PaymentMethodController::class);

    //Payee/Payer Controller
    Route::resource('payee_payers', App\Http\Controllers\Backend\Transaction\PayeePayerController::class);

    //Transaction Controller
    Route::get('transactions/income', [App\Http\Controllers\Backend\Transaction\TransactionController::class, 'income'])->name('transactions.manage_income');
    Route::get('transactions/expense', [App\Http\Controllers\Backend\Transaction\TransactionController::class, 'expense'])->name('transactions.manage_expense');
    Route::get('transactions/add_income', [App\Http\Controllers\Backend\Transaction\TransactionController::class, 'add_income'])->name('transactions.add_income');
    Route::get('transactions/add_expense', [App\Http\Controllers\Backend\Transaction\TransactionController::class, 'add_expense'])->name('transactions.add_expense');
    Route::resource('transactions', App\Http\Controllers\Backend\Transaction\TransactionController::class)->except(['index', 'create']);

    //Fee Type
    Route::resource('fee_types', App\Http\Controllers\Backend\StudentFee\FeeTypeController::class);

    //Invoice
    Route::get('invoices/class/{class_id}', [App\Http\Controllers\Backend\StudentFee\InvoiceController::class, 'index'])->name('invoices.index');
    Route::resource('invoices', App\Http\Controllers\Backend\StudentFee\InvoiceController::class);

    //Student Payments
    Route::get('student_payments/create/{invoice_id?}', [App\Http\Controllers\Backend\StudentFee\StudentPaymentController::class, 'create'])->name('student_payments.create');
    Route::get('student_payments/class/{class_id}', [App\Http\Controllers\Backend\StudentFee\StudentPaymentController::class, 'index'])->name('student_payments.index');
    Route::resource('student_payments', App\Http\Controllers\Backend\StudentFee\StudentPaymentController::class);


    //Report Controller
    Route::match(['get', 'post'],'reports/student_attendance_report/{view?}', [App\Http\Controllers\Backend\Attendance\ReportController::class, 'student_attendance_report'])->name('reports.student_attendance_report');
    Route::match(['get', 'post'],'reports/staff_attendance_report/{view?}', [App\Http\Controllers\Backend\Attendance\ReportController::class, 'staff_attendance_report'])->name('reports.staff_attendance_report');

    // Page About
    Route::resource('abouts', App\Http\Controllers\Backend\Page\AboutController::class);

    // User
    Route::get('users/get_users/{user_type}', [App\Http\Controllers\Backend\Support\SupportController::class, 'get_users']);
    Route::resource('users', App\Http\Controllers\Backend\User\UserController::class)->except('update');
    Route::put('users/{users}', [App\Http\Controllers\Backend\User\UserController::class, 'update'])->name('users.update');

    // Profile Controller
    Route::get('profile', [App\Http\Controllers\Backend\Profile\ProfileController::class, 'profile'])->name('profile.index');
    Route::get('profile/edit', [App\Http\Controllers\Backend\Profile\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [App\Http\Controllers\Backend\Profile\ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/password', [App\Http\Controllers\Backend\Profile\ProfileController::class, 'password'])->name('profile.password');
    Route::post('password/update', [App\Http\Controllers\Backend\Profile\ProfileController::class, 'profile_update'])->name('profile.passwordUpdate');

    // User Role
    Route::get('notifications', [App\Http\Controllers\Backend\Notification\NotificationController::class, 'index'])->name('notifications.index');
    Route::get('notifications/{notification}', [App\Http\Controllers\Backend\Notification\NotificationController::class, 'show'])->name('notifications.show');

    // Jobs
    Route::resource('jobs', App\Http\Controllers\Backend\Job\JobController::class);

    Route::get('jobs/applications/list', [App\Http\Controllers\Backend\Job\ApplicationController::class, 'index'])->name('jobappications.index');
    Route::get('jobs/applications/list/{id}', [App\Http\Controllers\Backend\Job\ApplicationController::class, 'show'])->name('jobappications.show');
    Route::delete('jobs/applications/destroy/{id}', [App\Http\Controllers\Backend\Job\ApplicationController::class, 'destroy'])->name('jobappications.destroy');

    // Course
    Route::resource('courses', App\Http\Controllers\Backend\Course\CourseController::class);
    Route::resource('coursecategories', App\Http\Controllers\Backend\Course\CourseController::class);

    Route::get('courses/applications/list', [App\Http\Controllers\Backend\Course\ApplicationController::class, 'index'])->name('courseappications.index');
    Route::get('courses/applications/list/{id}', [App\Http\Controllers\Backend\Course\ApplicationController::class, 'show'])->name('courseappications.show');
    Route::delete('courses/applications/destroy/{id}', [App\Http\Controllers\Backend\Course\ApplicationController::class, 'destroy'])->name('courseappications.destroy');

    Route::get('courses/comments/list', [App\Http\Controllers\Backend\Course\CommentController::class, 'index'])->name('coursecomments.index');
    Route::get('courses/comments/list/{id}', [App\Http\Controllers\Backend\Course\CommentController::class, 'show'])->name('coursecomments.show');
    Route::get('courses/comments/reply', [App\Http\Controllers\Backend\Course\CommentController::class, 'update'])->name('coursecomments.update');
    Route::delete('courses/comments/destroy', [App\Http\Controllers\Backend\Course\CommentController::class, 'destroy'])->name('coursecomments.destroy');

    // Notice
    Route::resource('notices', App\Http\Controllers\Backend\Notice\NoticeController::class);

    // Event
    Route::resource('events', App\Http\Controllers\Backend\Event\EventController::class);
    Route::get('event/calendar', [App\Http\Controllers\Backend\Event\EventController::class, 'calendar'])->name('events.calendar');
    Route::get('events/{event}/candidate', [App\Http\Controllers\Backend\Event\EventCandidateController::class, 'index'])->name('candidates.index');
    Route::delete('events/candidate/{candidate}', [App\Http\Controllers\Backend\Event\EventCandidateController::class, 'destroy'])->name('candidates.destroy');
    Route::resource('speakers', App\Http\Controllers\Backend\Event\EventSpeakerController::class)->except('show');

    // Blog
    Route::resource('news', App\Http\Controllers\Backend\Blog\BlogController::class)->except('show');
    Route::put('news/restore/{blog}', [App\Http\Controllers\Backend\Blog\BlogController::class, 'restore'])->name('news.restore');
    Route::delete('news/force-destroy/{blog}', [App\Http\Controllers\Backend\Blog\BlogController::class, 'forceDestroy'])->name('news.force-destroy');
    Route::resource('categories', App\Http\Controllers\Backend\Blog\CategoryController::class)->except(['create', 'show']);
    Route::resource('comments', App\Http\Controllers\Backend\Blog\CommentController::class)->only(['destroy', 'index']);

    // Gallery
    Route::resource('folders', App\Http\Controllers\Backend\Element\FolderController::class)->except(['create', 'show']);
    Route::resource('galleries', App\Http\Controllers\Backend\Element\GalleryController::class)->except('show');
    Route::get('galleries/{folder}', [App\Http\Controllers\Backend\Element\GalleryController::class, 'show'])->name('galleries.show');

    // Elements
    Route::resource('plugins', App\Http\Controllers\Backend\Element\PluginsController::class)->except('show');
    Route::resource('sliders', App\Http\Controllers\Backend\Element\SliderController::class);

    // Notification
    Route::resource('contacts', App\Http\Controllers\Backend\Notification\ContactController::class)->only(['index', 'destroy', 'update']);

    // Email
    Route::get('email/send', [App\Http\Controllers\Backend\Notification\EmailController::class, 'index'])->name('email.index');
    Route::post('email/send', [App\Http\Controllers\Backend\Notification\EmailController::class, 'send'])->name('email.send');
    Route::get('email/setting', [App\Http\Controllers\Backend\Notification\EmailController::class, 'detail'])->name('email.detail');
    Route::post('email/setting', [App\Http\Controllers\Backend\Notification\EmailController::class, 'setting'])->name('email.setting');
    Route::get('email/history', [App\Http\Controllers\Backend\Notification\EmailController::class, 'history'])->name('email.history');
    Route::get('email/delete', [App\Http\Controllers\Backend\Notification\EmailController::class, 'delete'])->name('email.destroy');

    //Report Controller
    Route::match(['get', 'post'],'reports/student_attendance_report/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'student_attendance_report'])->name('reports.student_attendance_report');
    Route::match(['get', 'post'],'reports/staff_attendance_report/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'staff_attendance_report'])->name('reports.staff_attendance_report');
    Route::match(['get', 'post'],'reports/student_id_card/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'student_id_card'])->name('reports.student_id_card');
    Route::match(['get', 'post'],'reports/exam_report/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'exam_report'])->name('reports.exam_report');
    Route::match(['get', 'post'],'reports/progress_card/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'progress_card'])->name('reports.progress_card');
    Route::match(['get', 'post'],'reports/class_routine/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'class_routine'])->name('reports.class_routine');
    Route::match(['get', 'post'],'reports/exam_routine/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'exam_routine'])->name('reports.exam_routine');
    Route::match(['get', 'post'],'reports/income_report/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'income_report'])->name('reports.income_report');
    Route::match(['get', 'post'],'reports/expense_report/{view?}', [App\Http\Controllers\Backend\Report\ReportController::class, 'expense_report'])->name('reports.expense_report');
    Route::get('reports/account_balance', [App\Http\Controllers\Backend\Report\ReportController::class, 'account_balance'])->name('reports.account_balance');

    // Settings
    Route::get('settings/general_settings', [App\Http\Controllers\Backend\Element\SettingsController::class, 'index'])->name('general_settings.index');
    Route::post('settings/logo/update', [App\Http\Controllers\Backend\Element\SettingsController::class, 'logo_update'])->name('settings.logoUpdate');
    Route::post('settings/meta/details', [App\Http\Controllers\Backend\Element\SettingsController::class, 'meta_update'])->name('settings.metaUpdate');
    Route::post('settings/offices/details', [App\Http\Controllers\Backend\Element\SettingsController::class, 'office_store'])->name('office.store');
    Route::post('settings/socials/details', [App\Http\Controllers\Backend\Element\SettingsController::class, 'social_store'])->name('socials.store');
    Route::post('settings/bank_accounts', [App\Http\Controllers\Backend\Element\SettingsController::class, 'bank_accounts'])->name('general_settings.bank');

    // Teacher Backend Controller
    // Provate Dashboard
    // Teacher Backend Route
    Route::get('teacher/my_profile', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'my_profile'])->name('teacher.my_profile');
    Route::get('teacher/my_student', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'my_student'])->name('teacher.my_student');
    Route::get('teacher/my_subjects/class/{class_id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'my_subjects'])->name('teacher.my_subjects');
    Route::get('teacher/my_subjects', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'my_subjects'])->name('teacher.my_subjects');
    Route::get('teacher/my_students/class/{class_id}/{section_id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'my_students'])->name('teacher.my_students');
    Route::get('teacher/my_students', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'my_students'])->name('teacher.my_students');
    Route::get('teacher/class_schedule', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'class_schedule'])->name('teacher.class_schedule');
    Route::get('teacher/mark_register', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'mark_register'])->name('teacher.mark_register');
    Route::post('teacher/marks/create', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'create_mark'])->name('teacher.create_mark');
    Route::post('teacher/marks/store', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'store_mark'])->name('teacher.store_mark');

    // Teacher Assignment Backend Route
    Route::get('teacher/assignments/class/{class_id?}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'assignments'])->name('teacher.assignments');
    Route::get('teacher/assignments', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'assignments'])->name('teacher.assignments');
    Route::get('teacher/create_assignment', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'create_assignment'])->name('teacher.create_assignment');
    Route::post('teacher/store_assignment', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'store_assignment'])->name('teacher.store_assignment');
    Route::get('teacher/edit_assignment/{id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'edit_assignment'])->name('teacher.edit_assignment');
    Route::get('teacher/assignment/{id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'show_assignment'])->name('teacher.show_assignment');
    Route::post('teacher/update_assignment/{id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'update_assignment'])->name('teacher.update_assignment');
    Route::get('teacher/destroy_assignment/{id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'destroy_assignment'])->name('teacher.destroy_assignment');

    // Teacher Subject
    Route::post('teacher/get_teacher_subject', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'get_teacher_subject']);

    // Teacher And Student Assignment
    Route::get('teacher/assign_student/class/{class_id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'assign_student'])->name('assign_student.list');
    Route::get('teacher/assign_student', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'assign_student'])->name('assign_student.list');
    Route::get('teacher/assigned_student/{id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'assigned_student'])->name('assigned_student.list');
    Route::delete('teacher/assigned_student/{id}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'destory_assigned_student'])->name('assigned_student.destory');
    Route::get('teacher/assigned_student/{assignmentid}/{studentid}', [App\Http\Controllers\Backend\Personal\TeacherController::class, 'show_assigned_student'])->name('assigned_student.show');

    // Student Backend Controller
    // Private Dashboard
    // Student Backend Route
    Route::get('student/my_profile', [App\Http\Controllers\Backend\Personal\StudentController::class, 'my_profile'])->name('student.my_profile');
    Route::get('student/my_friends', [App\Http\Controllers\Backend\Personal\StudentController::class, 'my_friends'])->name('student.my_friends');
    Route::get('student/my_subjects', [App\Http\Controllers\Backend\Personal\StudentController::class, 'my_subjects'])->name('student.my_subjects');
    Route::get('student/class_routine', [App\Http\Controllers\Backend\Personal\StudentController::class, 'class_routine'])->name('student.class_routine');
    Route::match(['get', 'post'],'student/exam_routine/{view?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'exam_routine'])->name('student.exam_routine');
    Route::get('student/progress_card', [App\Http\Controllers\Backend\Personal\StudentController::class, 'progress_card'])->name('student.progress_card');

    Route::get('student/my_invoice/{status?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'my_invoice'])->name('student.my_invoice');
    Route::get('student/view_invoice/{id?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'view_invoice'])->name('student.view_invoice');
    Route::get('student/invoice_payment/{method?}/{invoice_id?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'invoice_payment'])->name('student.invoice_payment');
    Route::get('student/esewa/{action?}/{invoice_id?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'paypal'])->name('student.paypal');
    Route::post('student/stripe_payment/{invoice_id?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'stripe_payment'])->name('student.stripe_payment');
    Route::get('student/payment_history', [App\Http\Controllers\Backend\Personal\StudentController::class, 'payment_history'])->name('student.payment_history');
    Route::post('student/esewa_payment', [App\Http\Controllers\Backend\Personal\StudentController::class, 'esewa_payment'])->name('student.esewa');

    Route::get('student/payment_requests', [App\Http\Controllers\Backend\Personal\StudentController::class, 'payment_requests'])->name('payment_requests.index');
    Route::get('student/payment_requests/{payment_request}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'payment_request_destroy'])->name('payment_requests.destroy');

    Route::get('student/my_syllabus', [App\Http\Controllers\Backend\Personal\StudentController::class, 'my_syllabus'])->name('student.my_syllabus');
    Route::get('student/view_syllabus/{id?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'view_syllabus'])->name('student.view_syllabus');

    // Assignments
    Route::get('student/my_assignment', [App\Http\Controllers\Backend\Personal\StudentController::class, 'my_assignment'])->name('student.my_assignment');
    Route::get('student/view_assignment/{id?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'view_assignment'])->name('student.view_assignment');
    Route::get('student/submit_assignment/{id?}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'submit_assignment'])->name('student.submit_assignment');
    Route::post('student/store_assignment', [App\Http\Controllers\Backend\Personal\StudentController::class, 'store_assignment'])->name('student.store_assignment');
    Route::delete('student/store_assignment/{id}', [App\Http\Controllers\Backend\Personal\StudentController::class, 'destroy_assignment'])->name('student.destroy_assignment');
    Route::post('student/assign_student', [App\Http\Controllers\Backend\Personal\StudentController::class, 'assign_student'])->name('student.assign_student');
    Route::get('student/share-files', [App\Http\Controllers\Backend\Personal\StudentController::class, 'sharefile'])->name('student.sharefile');
    Route::post('student/upload', [App\Http\Controllers\Backend\Personal\StudentController::class, 'store_assignment'])->name('upload');


    // Student Parent Backend Controller
    // Private Dashboard
    // Student Parent Backend Route
    Route::get('parent/my_profile', [App\Http\Controllers\Backend\Personal\ParentController::class, 'my_profile'])->name('parent.my_profile');
    Route::get('parent/my_children/{student_id?}', [App\Http\Controllers\Backend\Personal\ParentController::class, 'my_children'])->name('parent.my_children');
    Route::match(['get', 'post'],'parent/children_attendance/{student_id?}', [App\Http\Controllers\Backend\Personal\ParentController::class, 'children_attendance'])->name('parent.children_attendance');
    Route::get('parent/progress_card/{student_id?}', [App\Http\Controllers\Backend\Personal\ParentController::class, 'progress_card'])->name('parent.progress_card');


    // Website
    Route::get('pages/introduction', [App\Http\Controllers\Backend\Pages\AboutController::class, 'introduction'])->name('abouts.introduction');
    Route::post('pages/store', [App\Http\Controllers\Backend\Pages\AboutController::class, 'introduction_store'])->name('abouts.store');
    Route::get('pages/message-from-the-director', [App\Http\Controllers\Backend\Pages\AboutController::class, 'director'])->name('abouts.director');
    Route::get('pages/facility-and-resource', [App\Http\Controllers\Backend\Pages\AboutController::class, 'facility'])->name('abouts.facility');
    Route::get('pages/placement-support-unit', [App\Http\Controllers\Backend\Pages\AboutController::class, 'placement'])->name('abouts.placement');
    Route::get('pages/our-objective-mission-and-vision', [App\Http\Controllers\Backend\Pages\AboutController::class, 'objective'])->name('abouts.objective');


    // Element Benefit
    Route::get('why-choose-us', [App\Http\Controllers\Backend\Element\BenefitController::class, 'index'])->name('benefits.index');
    Route::post('why-choose-us', [App\Http\Controllers\Backend\Element\BenefitController::class, 'store'])->name('benefits.store');

    // Element Journey
    Route::get('about-us', [App\Http\Controllers\Backend\Element\JourneyController::class, 'index'])->name('journey.index');
    Route::post('about-us', [App\Http\Controllers\Backend\Element\JourneyController::class, 'store'])->name('journey.store');

    // Element Team Member
    Route::resource('team_members', App\Http\Controllers\Backend\Element\FacultyMemberController::class);
    Route::resource('team_categories', App\Http\Controllers\Backend\Element\FacultyCategoryController::class)->except(['show', 'create']);

    // Element
    Route::resource('testimonials', App\Http\Controllers\Backend\Element\TestimonialController::class);
    Route::resource('downloads', App\Http\Controllers\Backend\Element\DownloadController::class);

    // Appointment
    Route::get('appointments', [App\Http\Controllers\Backend\Appointment\AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{appointment}', [App\Http\Controllers\Backend\Appointment\AppointmentController::class, 'show'])->name('appointments.show');
    Route::post('appointments/{appointment}/destroy', [App\Http\Controllers\Backend\Appointment\AppointmentController::class, 'destroy'])->name('appointments.destroy');

    // Faq
    Route::get('faqs', [App\Http\Controllers\Backend\Envelope\FaqController::class, 'index'])->name('faqs.index');
    Route::get('faqs/{faq}/show', [App\Http\Controllers\Backend\Envelope\FaqController::class, 'show'])->name('faqs.show');
    Route::get('faqs/{faq}/reply', [App\Http\Controllers\Backend\Envelope\FaqController::class, 'reply'])->name('faqs.reply');
    Route::put('faqs/{faq}/update', [App\Http\Controllers\Backend\Envelope\FaqController::class, 'update'])->name('faqs.update');
    Route::delete('faqs/{faq}/delete', [App\Http\Controllers\Backend\Envelope\FaqController::class, 'destory'])->name('faqs.destory');

    // Admininstration
    Route::get('administration/backup_database', [App\Http\Controllers\Backend\Utility\UtilityController::class, 'backup_database'])->name('utility.backup_database');
    Route::resource('academic_years', App\Http\Controllers\Backend\Utility\AcademicYearController::class);
    Route::resource('picklists', App\Http\Controllers\Backend\Utility\PicklistController::class)->except('show');

    // Transaction Request
    Route::get('transaction_requests', [App\Http\Controllers\Backend\Transaction\RequestController::class, 'index'])->name('transaction_requests.index');
    Route::get('transaction_requests/{transaction_request}', [App\Http\Controllers\Backend\Transaction\RequestController::class, 'edit'])->name('transaction_requests.edit');
    Route::put('transaction_requests/{transaction_request}', [App\Http\Controllers\Backend\Transaction\RequestController::class, 'update'])->name('transaction_requests.update');
    Route::delete('transaction_requests/{transaction_request}', [App\Http\Controllers\Backend\Transaction\RequestController::class, 'delete'])->name('transaction_requests.destroy');

    // Application
    Route::get('applications', [App\Http\Controllers\Backend\Application\ApplicationController::class, 'index'])->name('application_requests.index');
    Route::get('applications/{application}/show', [App\Http\Controllers\Backend\Application\ApplicationController::class, 'show'])->name('application_requests.show');
    Route::post('applications/{application}/update', [App\Http\Controllers\Backend\Application\ApplicationController::class, 'update'])->name('application_requests.update');

    Route::get('applications/request', [App\Http\Controllers\Backend\Personal\ApplicationController::class, 'leave_application_index'])->name('applications.index');
    Route::get('applications/apply', [App\Http\Controllers\Backend\Personal\ApplicationController::class, 'leave_application_create'])->name('applications.create');
    Route::post('applications/request', [App\Http\Controllers\Backend\Personal\ApplicationController::class, 'leave_application_store'])->name('applications.store');
    Route::get('applications/{application}', [App\Http\Controllers\Backend\Personal\ApplicationController::class, 'leave_application_show'])->name('applications.show');
    Route::get('applications/{application}/edit', [App\Http\Controllers\Backend\Personal\ApplicationController::class, 'leave_application_edit'])->name('applications.edit');
    Route::put('applications/{application}', [App\Http\Controllers\Backend\Personal\ApplicationController::class, 'leave_application_update'])->name('applications.update');
    Route::put('applications/{application}/cancel', [App\Http\Controllers\Backend\Personal\ApplicationController::class, 'leave_application_cancel'])->name('applications.cancel');

    // Front Desk
    Route::resource('visitors', App\Http\Controllers\Backend\FrontDesk\VisitorController::class);
    Route::resource('generalcalls', App\Http\Controllers\Backend\FrontDesk\GeneralCallController::class);
    Route::resource('dispatches', App\Http\Controllers\Backend\FrontDesk\DispatchController::class)->except('create');
    Route::get('receives', [App\Http\Controllers\Backend\FrontDesk\DispatchController::class, 'receive'])->name('dispatches.receive');
    Route::get('receive/{dispatch}/edit', [App\Http\Controllers\Backend\FrontDesk\DispatchController::class, 'receive_edit'])->name('dispatches.receive_edit');
    Route::resource('complaints', App\Http\Controllers\Backend\FrontDesk\ComplaintController::class);
    
    // Student Request
    Route::get('student/requests', [App\Http\Controllers\Backend\Request\StudentController::class, 'index'])->name('user_requests.index');
    Route::get('student/requests/create', [App\Http\Controllers\Backend\Request\StudentController::class, 'create'])->name('user_requests.create');
    Route::get('student/{student_request}/show', [App\Http\Controllers\Backend\Request\StudentController::class, 'show'])->name('user_requests.show');
    Route::post('student/request', [App\Http\Controllers\Backend\Request\StudentController::class, 'store'])->name('user_requests.store');
    Route::get('student/{student_request}/edit', [App\Http\Controllers\Backend\Request\StudentController::class, 'edit'])->name('user_requests.edit');
    Route::patch('student/{student_request}/edit', [App\Http\Controllers\Backend\Request\StudentController::class, 'update'])->name('user_requests.update');
    Route::post('student/{student_request}/accept', [App\Http\Controllers\Backend\Request\StudentController::class, 'accept'])->name('user_requests.accept');
    Route::post('student/{student_request}/reject', [App\Http\Controllers\Backend\Request\StudentController::class, 'reject'])->name('user_requests.reject');
    
});
