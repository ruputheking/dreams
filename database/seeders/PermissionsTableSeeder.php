<?php

namespace Database\Seeders;

use DB;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();

// Admin Permission
        // crud assign subject admin
        $crudAdmin = new Permission;
        $crudAdmin->name = 'crud-admin-assign-subject';
        $crudAdmin->save();

        // crud class routine admin
        $crudAdminClassRoutine = new Permission;
        $crudAdminClassRoutine->name = 'crud-admin-class-routine';
        $crudAdminClassRoutine->save();

        // crud section admin
        $crudAdminSection = new Permission;
        $crudAdminSection->name = 'crud-admin-section';
        $crudAdminSection->save();

        // crud subject admin
        $crudAdminSubject = new Permission;
        $crudAdminSubject->name = 'crud-admin-subject';
        $crudAdminSubject->save();

        // crud syllabus admin
        $crudAdminSyllabus = new Permission;
        $crudAdminSyllabus->name = 'crud-admin-syllabus';
        $crudAdminSyllabus->save();

        // crud applicaiton request admin
        $crudAdminApplication = new Permission;
        $crudAdminApplication->name = 'crud-admin-application-request';
        $crudAdminApplication->save();

        // crud assignment admin
        $crudAdminAssignment = new Permission;
        $crudAdminAssignment->name = 'crud-admin-assignment';
        $crudAdminAssignment->save();

        // crud blog admin
        $crudAdminBlog = new Permission;
        $crudAdminBlog->name = 'crud-admin-blog';
        $crudAdminBlog->save();

        // crud blgo category admin
        $crudAdminBlogCategory = new Permission;
        $crudAdminBlogCategory->name = 'crud-admin-blog-category';
        $crudAdminBlogCategory->save();

        // crud blog comment admin
        $crudAdminBlogComment = new Permission;
        $crudAdminBlogComment->name = 'crud-admin-blog-comment';
        $crudAdminBlogComment->save();

        // crud course admin
        $crudAdminCourse = new Permission;
        $crudAdminCourse->name = 'crud-admin-course';
        $crudAdminCourse->save();

        // crud course category admin
        $crudAdminCourseCategory = new Permission;
        $crudAdminCourseCategory->name = 'crud-admin-course-category';
        $crudAdminCourseCategory->save();

        // crud benefit admin
        $crudAdminBenefit = new Permission;
        $crudAdminBenefit->name = 'crud-admin-benefit';
        $crudAdminBenefit->save();

        // crud download admin
        $crudAdminDownload = new Permission;
        $crudAdminDownload->name = 'crud-admin-download';
        $crudAdminDownload->save();

        // crud faculty category admin
        $crudAdminFacultyCategory = new Permission;
        $crudAdminFacultyCategory->name = 'crud-admin-faculty-category';
        $crudAdminFacultyCategory->save();

        // crud faculty member admin
        $crudAdminFacultyMember = new Permission;
        $crudAdminFacultyMember->name = 'crud-admin-faculty-member';
        $crudAdminFacultyMember->save();

        // crud folder admin
        $crudAdminFolder = new Permission;
        $crudAdminFolder->name = 'crud-admin-folder';
        $crudAdminFolder->save();

        // crud gallery admin
        $crudAdminGallery = new Permission;
        $crudAdminGallery->name = 'crud-admin-gallery';
        $crudAdminGallery->save();

        // crud journey admin
        $crudAdminJourney = new Permission;
        $crudAdminJourney->name = 'crud-admin-journey';
        $crudAdminJourney->save();

        // crud plugins admin
        $crudAdminPlugins = new Permission;
        $crudAdminPlugins->name = 'crud-admin-plugins';
        $crudAdminPlugins->save();

        // crud settings admin
        $crudAdminSettings = new Permission;
        $crudAdminSettings->name = 'crud-admin-settings';
        $crudAdminSettings->save();

        // crud slider admin
        $crudAdminSlider = new Permission;
        $crudAdminSlider->name = 'crud-admin-slider';
        $crudAdminSlider->save();

        // crud testimonial admin
        $crudAdminTestimonial = new Permission;
        $crudAdminTestimonial->name = 'crud-admin-testimonial';
        $crudAdminTestimonial->save();

        // crud faq admin
        $crudAdminFaq = new Permission;
        $crudAdminFaq->name = 'crud-admin-faq';
        $crudAdminFaq->save();

        // crud event admin
        $crudAdminEvent = new Permission;
        $crudAdminEvent->name = 'crud-admin-event';
        $crudAdminEvent->save();

        // crud event candidate admin
        $crudAdminEventCandidate = new Permission;
        $crudAdminEventCandidate->name = 'crud-admin-event-candidate';
        $crudAdminEventCandidate->save();

        // crud event speaker admin
        $crudAdminEventSpeaker = new Permission;
        $crudAdminEventSpeaker->name = 'crud-admin-event-speaker';
        $crudAdminEventSpeaker->save();

        // crud exam admin
        $crudAdminExam = new Permission;
        $crudAdminExam->name = 'crud-admin-exam';
        $crudAdminExam->save();

        // crud job admin
        $crudAdminJob = new Permission;
        $crudAdminJob->name = 'crud-admin-job';
        $crudAdminJob->save();

        // crud job application admin
        $crudAdminJobApplication = new Permission;
        $crudAdminJobApplication->name = 'crud-admin-job-application';
        $crudAdminJobApplication->save();

        // crud grade admin
        $crudAdminGrade = new Permission;
        $crudAdminGrade->name = 'crud-admin-grade';
        $crudAdminGrade->save();

        // crud mark admin
        $crudAdminMark = new Permission;
        $crudAdminMark->name = 'crud-admin-mark';
        $crudAdminMark->save();

        // crud mark distribution admin
        $crudAdminMarkDistribution = new Permission;
        $crudAdminMarkDistribution->name = 'crud-admin-mark-distribution';
        $crudAdminMarkDistribution->save();

        // crud notice admin
        $crudAdminNotice = new Permission;
        $crudAdminNotice->name = 'crud-admin-notice';
        $crudAdminNotice->save();

        // crud about admin
        $crudAdminAbout = new Permission;
        $crudAdminAbout->name = 'crud-admin-about';
        $crudAdminAbout->save();

        // crud sharefile admin
        $crudAdminShareFile = new Permission;
        $crudAdminShareFile->name = 'crud-admin-sharefile';
        $crudAdminShareFile->save();

        // crud user admin
        $crudAdminUser = new Permission;
        $crudAdminUser->name = 'crud-admin-user';
        $crudAdminUser->save();

        // crud academic year admin
        $crudAdminAcademicYear = new Permission;
        $crudAdminAcademicYear->name = 'crud-admin-academic-year';
        $crudAdminAcademicYear->save();

        // crud picklist admin
        $crudAdminPicklist = new Permission;
        $crudAdminPicklist->name = 'crud-admin-picklist';
        $crudAdminPicklist->save();

        // crud utility admin
        $crudAdminUtility = new Permission;
        $crudAdminUtility->name = 'crud-admin-utility';
        $crudAdminUtility->save();


// Reception Permission
        // crud receptionist
        $crudAppointment = new Permission;
        $crudAppointment->name = 'crud-admin-appointment';
        $crudAppointment->save();

        // crud receptionist
        $crudReceptionEmail = new Permission;
        $crudReceptionEmail->name = 'crud-admin-email';
        $crudReceptionEmail->save();

        // crud receptionist
        $crudReceptionContact = new Permission;
        $crudReceptionContact->name = 'crud-admin-contact';
        $crudReceptionContact->save();

        // crud receptionist
        $crudReceptionComment = new Permission;
        $crudReceptionComment->name = 'crud-admin-course-comments';
        $crudReceptionComment->save();

        // crud receptionist
        $crudReceptionApplication = new Permission;
        $crudReceptionApplication->name = 'crud-admin-course-application';
        $crudReceptionApplication->save();

        // crud receptionist
        $crudReceptionAttendance = new Permission;
        $crudReceptionAttendance->name = 'crud-admin-attendance';
        $crudReceptionAttendance->save();

        // crud receptionist
        $crudReceptionComplaint = new Permission;
        $crudReceptionComplaint->name = 'crud-admin-complaint';
        $crudReceptionComplaint->save();

        // crud receptionist
        $crudReceptionDispatch = new Permission;
        $crudReceptionDispatch->name = 'crud-admin-dispatch';
        $crudReceptionDispatch->save();

        // crud receptionist
        $crudReceptionGeneralCall = new Permission;
        $crudReceptionGeneralCall->name = 'crud-admin-general-calls';
        $crudReceptionGeneralCall->save();

        // crud receptionist
        $crudReceptionVisitor = new Permission;
        $crudReceptionVisitor->name = 'crud-admin-visitors';
        $crudReceptionVisitor->save();


// Accountant Permission
        // crud student accountant
        $crudAccountant = new Permission;
        $crudAccountant->name = 'crud-admin-student';
        $crudAccountant->save();

        // crud teacher
        $crudAccountantTeacher = new Permission;
        $crudAccountantTeacher->name = 'crud-admin-teacher';
        $crudAccountantTeacher->save();

        // crud parent accountant
        $crudAccountantParent = new Permission;
        $crudAccountantParent->name = 'crud-admin-parent';
        $crudAccountantParent->save();

        // crud account accountant
        $crudAccountantAccount = new Permission;
        $crudAccountantAccount->name = 'crud-admin-account';
        $crudAccountantAccount->save();

        // crud transactions accountant
        $crudAccountantTransaction = new Permission;
        $crudAccountantTransaction->name = 'crud-admin-transactions';
        $crudAccountantTransaction->save();

        // crud payee payers accountant
        $crudAccountantPayeePayer = new Permission;
        $crudAccountantPayeePayer->name = 'crud-admin-payee-payers';
        $crudAccountantPayeePayer->save();

        // crud payments accountant
        $crudAccountantPayment = new Permission;
        $crudAccountantPayment->name = 'crud-admin-payments';
        $crudAccountantPayment->save();

        // crud request accountant
        $crudAccountantRequest = new Permission;
        $crudAccountantRequest->name = 'crud-admin-requests';
        $crudAccountantRequest->save();

        // crud chart of accounts accountant
        $crudAccountantChartOfAccount = new Permission;
        $crudAccountantChartOfAccount->name = 'crud-admin-chart-of-accounts';
        $crudAccountantChartOfAccount->save();

        // crud fee type accountant
        $crudAccountantFeeType = new Permission;
        $crudAccountantFeeType->name = 'crud-admin-fee-types';
        $crudAccountantFeeType->save();

        // crud invoice accountant
        $crudAccountantInvoice = new Permission;
        $crudAccountantInvoice->name = 'crud-admin-invoices';
        $crudAccountantInvoice->save();

        // crud student payments accountant
        $crudAccountantStudentPayment = new Permission;
        $crudAccountantStudentPayment->name = 'crud-admin-student-payments';
        $crudAccountantStudentPayment->save();

        // crud attendance report accountant
        $crudAccountantAttendanceReport = new Permission;
        $crudAccountantAttendanceReport->name = 'crud-admin-attendance-report';
        $crudAccountantAttendanceReport->save();

        // crud report accountant
        $crudAccountantReport = new Permission;
        $crudAccountantReport->name = 'crud-admin-reports';
        $crudAccountantReport->save();

        // Parent Attachment
        $accountant = Role::whereName('accountant')->first();
        $accountant->detachPermissions([$crudAccountant, $crudAccountantTeacher, $crudAccountantParent, $crudAccountantAccount, $crudAccountantTransaction, $crudAccountantPayeePayer, $crudAccountantPayment, $crudAccountantRequest, $crudAccountantChartOfAccount, $crudAccountantFeeType, $crudAccountantInvoice, $crudAccountantStudentPayment, $crudAccountantAttendanceReport, $crudAccountantReport]);
        $accountant->attachPermissions([$crudAccountant, $crudAccountantTeacher, $crudAccountantParent, $crudAccountantAccount, $crudAccountantTransaction, $crudAccountantPayeePayer, $crudAccountantPayment, $crudAccountantRequest, $crudAccountantChartOfAccount, $crudAccountantFeeType, $crudAccountantInvoice, $crudAccountantStudentPayment, $crudAccountantAttendanceReport, $crudAccountantReport]);

// Teacher Permission
        // crud parent
        $crudTeachers = new Permission();
        $crudTeachers->name = "crud-teacher";
        $crudTeachers->save();

        // Parent Attachment
        $teacher = Role::whereName('teacher')->first();
        $teacher->detachPermissions([$crudTeachers]);
        $teacher->attachPermissions([$crudTeachers]);

// Parent Permission
        // crud parent
        $crudParents = new Permission();
        $crudParents->name = "crud-parent";
        $crudParents->save();

        // Parent Attachment
        $parents = Role::whereName('guardian')->first();
        $parents->detachPermissions([$crudParents]);
        $parents->attachPermissions([$crudParents]);

// Student Permission
        // crud student
        $crudStudents = new Permission();
        $crudStudents->name = "crud-student";
        $crudStudents->save();

        // Student Attachment
        $student = Role::whereName('student')->first();
        $student->detachPermissions([$crudStudents]);
        $student->attachPermissions([$crudStudents]);

        // Admin
        $admin = Role::whereName('admin')->first();
        $admin->detachPermissions([$crudAdminNotice, $crudAdminGallery, $crudAdmin, $crudAdminClassRoutine, $crudAdminSection, $crudAdminSubject, $crudAdminSyllabus, $crudAdminApplication, $crudAdminAssignment, $crudAdminBlogComment, $crudAdminBlog, $crudAdminBlogCategory, $crudAdminCourse, $crudAdminCourseCategory, $crudAdminBenefit, $crudAdminDownload, $crudAdminFacultyMember, $crudAdminFacultyCategory, $crudAdminFolder, $crudAdminJourney, $crudAdminPlugins, $crudAdminSettings, $crudAdminSlider, $crudAdminTestimonial, $crudAdminFaq, $crudAdminEvent, $crudAdminEventSpeaker, $crudAdminEventCandidate, $crudAdminExam, $crudAdminJob, $crudAdminJobApplication, $crudAdminGrade, $crudAdminMark, $crudAdminAbout, $crudAdminShareFile, $crudAdminUser, $crudAdminAcademicYear, $crudAdminPicklist, $crudAdminUtility, $crudAppointment, $crudReceptionEmail, $crudReceptionContact, $crudReceptionComment, $crudReceptionApplication, $crudReceptionAttendance, $crudReceptionComplaint, $crudReceptionDispatch, $crudReceptionGeneralCall, $crudReceptionVisitor, $crudAccountant, $crudAccountantTeacher, $crudAccountantParent, $crudAccountantAccount, $crudAccountantTransaction, $crudAccountantPayeePayer, $crudAccountantPayment, $crudAccountantRequest, $crudAccountantChartOfAccount, $crudAccountantFeeType, $crudAccountantInvoice, $crudAccountantStudentPayment, $crudAccountantAttendanceReport, $crudAccountantReport]);
        $admin->attachPermissions([$crudAdminNotice, $crudAdminGallery, $crudAdmin, $crudAdminClassRoutine, $crudAdminSection, $crudAdminSubject, $crudAdminSyllabus, $crudAdminApplication, $crudAdminAssignment, $crudAdminBlogComment, $crudAdminBlog, $crudAdminBlogCategory, $crudAdminCourse, $crudAdminCourseCategory, $crudAdminBenefit, $crudAdminDownload, $crudAdminFacultyMember, $crudAdminFacultyCategory, $crudAdminFolder, $crudAdminJourney, $crudAdminPlugins, $crudAdminSettings, $crudAdminSlider, $crudAdminTestimonial, $crudAdminFaq, $crudAdminEvent, $crudAdminEventSpeaker, $crudAdminEventCandidate, $crudAdminExam, $crudAdminJob, $crudAdminJobApplication, $crudAdminGrade, $crudAdminMark, $crudAdminAbout, $crudAdminShareFile, $crudAdminUser, $crudAdminAcademicYear, $crudAdminPicklist, $crudAdminUtility, $crudAppointment, $crudReceptionEmail, $crudReceptionContact, $crudReceptionComment, $crudReceptionApplication, $crudReceptionAttendance, $crudReceptionComplaint, $crudReceptionDispatch, $crudReceptionGeneralCall, $crudReceptionVisitor, $crudAccountant, $crudAccountantTeacher, $crudAccountantParent, $crudAccountantAccount, $crudAccountantTransaction, $crudAccountantPayeePayer, $crudAccountantPayment, $crudAccountantRequest, $crudAccountantChartOfAccount, $crudAccountantFeeType, $crudAccountantInvoice, $crudAccountantStudentPayment, $crudAccountantAttendanceReport, $crudAccountantReport]);

        // receptionist
        $receptionist = Role::whereName('receptionist')->first();
        $receptionist->detachPermissions([$crudAppointment, $crudReceptionEmail, $crudReceptionContact, $crudReceptionComment, $crudReceptionApplication, $crudReceptionAttendance, $crudReceptionComplaint, $crudReceptionDispatch, $crudReceptionGeneralCall, $crudReceptionVisitor, $crudAccountant, $crudAccountantTeacher, $crudAccountantParent, $crudAccountantAccount, $crudAccountantTransaction, $crudAccountantPayeePayer, $crudAccountantPayment, $crudAccountantRequest, $crudAccountantChartOfAccount, $crudAccountantFeeType, $crudAccountantInvoice, $crudAccountantStudentPayment, $crudAccountantAttendanceReport, $crudAccountantReport]);
        $receptionist->attachPermissions([$crudAppointment, $crudReceptionEmail, $crudReceptionContact, $crudReceptionComment, $crudReceptionApplication, $crudReceptionAttendance, $crudReceptionComplaint, $crudReceptionDispatch, $crudReceptionGeneralCall, $crudReceptionVisitor, $crudAccountant, $crudAccountantTeacher, $crudAccountantParent, $crudAccountantAccount, $crudAccountantTransaction, $crudAccountantPayeePayer, $crudAccountantPayment, $crudAccountantRequest, $crudAccountantChartOfAccount, $crudAccountantFeeType, $crudAccountantInvoice, $crudAccountantStudentPayment, $crudAccountantAttendanceReport, $crudAccountantReport]);

    }
}
