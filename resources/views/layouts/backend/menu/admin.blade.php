@role('admin')
<!-- Optionally, you can add icons to the links -->
<li class="{{ Nav::isRoute('dashboard') }}">
    <a href="{{ route('dashboard') }}" title="Dashboard">
        <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
    </a>
</li>
<li class="{{ Nav::isRoute('notifications.index') }}">
    <a href="{{route('notifications.index') }}">
        <i class="fa fa-bell"></i> Notification <span style="color:white;margin-left:10px;border-radius:10px 10px;padding:1px 7px;"> {{ get_user_notification()->count() }}</span>
    </a>
</li>
<li class="treeview {{ Nav::isRoute('profile.index') }} {{ Nav::isRoute('profile.edit') }} {{ Nav::isRoute('profile.password') }}">
    <a href="#">
        <i class="fa fa-user"></i> <span>Profile</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('profile.index') }}">
            <a href="{{route('profile.index')}}"><i class="far fa-circle"></i>Profile</a>
        </li>
        <li class="{{ Nav::isRoute('profile.edit') }}">
            <a href="{{route('profile.edit')}}"><i class="far fa-circle"></i>Update Profile</a>
        </li>
        <li class="{{ Nav::isRoute('profile.password') }}">
            <a href="{{route('profile.password')}}"><i class="far fa-circle"></i>Change Password</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('user_requests.index') }} {{ Nav::isRoute('user_requests.edit') }} {{ Nav::isRoute('user_requests.show') }} {{ Nav::isRoute('faqs.index') }} {{ Nav::isRoute('faqs.show') }} {{ Nav::isRoute('faqs.reply') }} {{ Nav::isRoute('contacts.index') }} {{ Nav::isRoute('testimonials.index') }} {{ Nav::isRoute('testimonials.show') }} {{ Nav::isRoute('testimonials.create') }} {{ Nav::isRoute('testimonials.edit') }} {{ Nav::isRoute('appointments.index') }} {{ Nav::isRoute('appointments.show') }}">
    <a href="#">
        <i class="fa fa-envelope" aria-hidden="true"></i> <span>Envelope</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('faqs.index') }} {{ Nav::isRoute('faqs.show') }} {{ Nav::isRoute('faqs.reply') }}">
            <a href="{{route('faqs.index')}}"><i class="far fa-circle"></i> FAQs</a>
        </li>
        <li class="{{ Nav::isRoute('testimonials.index') }} {{ Nav::isRoute('testimonials.show') }} {{ Nav::isRoute('testimonials.create') }} {{ Nav::isRoute('testimonials.edit') }}">
            <a href="{{route('testimonials.index')}}"><i class="far fa-circle"></i> Testimonial</a>
        </li>
        <li class="{{ Nav::isRoute('contacts.index') }}">
            <a href="{{route('contacts.index')}}"><i class="far fa-circle"></i> Contact Message</a>
        </li>
        <li class="{{ Nav::isRoute('user_requests.index') }} {{ Nav::isRoute('user_requests.edit') }} {{ Nav::isRoute('user_requests.show') }}">
            <a href="{{route('user_requests.index')}}"><i class="far fa-circle"></i> Student Request List</a>
        </li>
        <li class="{{ Nav::isRoute('appointments.index') }} {{ Nav::isRoute('appointments.show') }}">
            <a href="{{route('appointments.index')}}"><i class="far fa-circle"></i> Appointment Routine</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('dispatches.receive_edit') }} {{ Nav::isRoute('dispatches.edit') }} {{ Nav::isRoute('dispatches.receive') }} {{ Nav::isRoute('dispatches.index') }} {{ Nav::isRoute('generalcalls.index') }} {{ Nav::isRoute('generalcalls.edit') }} {{ Nav::isRoute('generalcalls.create') }} {{ Nav::isRoute('generalcalls.show') }} {{ Nav::isRoute('complaints.index') }} {{ Nav::isRoute('complaints.show') }} {{ Nav::isRoute('complaints.create') }} {{ Nav::isRoute('complaints.edit') }} {{ Nav::isRoute('visitors.index') }} {{ Nav::isRoute('visitors.show') }} {{ Nav::isRoute('visitors.edit') }} {{ Nav::isRoute('visitors.create') }}">
    <a href="#">
        <i class="fab fa-ioxhost" aria-hidden="true"></i> <span>Front Desk</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('visitors.index') }} {{ Nav::isRoute('visitors.show') }} {{ Nav::isRoute('visitors.edit') }} {{ Nav::isRoute('visitors.create') }}">
            <a href="{{route('visitors.index')}}"><i class="far fa-circle"></i> Visitor Book</a>
        </li>
        <li class="{{ Nav::isRoute('generalcalls.index') }} {{ Nav::isRoute('generalcalls.edit') }} {{ Nav::isRoute('generalcalls.create') }} {{ Nav::isRoute('generalcalls.show') }}">
            <a href="{{route('generalcalls.index')}}"><i class="far fa-circle"></i> Phone Call Logs</a>
        </li>
        <li class="{{ Nav::isRoute('dispatches.index') }} {{ Nav::isRoute('dispatches.edit') }}">
            <a href="{{route('dispatches.index')}}"><i class="far fa-circle"></i> Postal Dispatch</a>
        </li>
        <li class="{{ Nav::isRoute('dispatches.receive') }} {{ Nav::isRoute('dispatches.receive_edit') }}">
            <a href="{{route('dispatches.receive')}}"><i class="far fa-circle"></i> Postal Receive</a>
        </li>
        <li class="{{ Nav::isRoute('complaints.index') }} {{ Nav::isRoute('complaints.show') }} {{ Nav::isRoute('complaints.create') }} {{ Nav::isRoute('complaints.edit') }}">
            <a href="{{route('complaints.index')}}"><i class="far fa-circle"></i> Complain</a>
        </li>
    </ul>
</li>
<li class="{{ Nav::isRoute('students.index') }} {{ Nav::isRoute('students.edit') }} {{ Nav::isRoute('students.create') }} {{ Nav::isRoute('students.promote') }}">
    <a href="{{ route('students.index') }}">
        <i class="fa fa-address-card"></i> <span>Student</span>
    </a>
</li>
<li class="{{Nav::isRoute('parents.index')}} {{Nav::isRoute('parents.show')}} {{Nav::isRoute('parents.edit')}} {{Nav::isRoute('parents.create')}}">
    <a href="{{route('parents.index')}}" title="Parents"><i class="fas fa-user-circle"></i> <span style="padding-left:5px;">Parents</span></a>
</li>
<li class="{{Nav::isRoute('teachers.index')}} {{Nav::isRoute('teachers.show')}} {{Nav::isRoute('teachers.edit')}} {{Nav::isRoute('teachers.create')}}">
    <a href="{{route('teachers.index')}}" title="Teacher"><i class="fa fa-address-book"></i> <span>Teacher</span></a>
</li>
<li class="treeview {{ Nav::isRoute('syllabus.index') }} {{ Nav::isRoute('syllabus.create') }} {{ Nav::isRoute('syllabus.edit') }} {{ Nav::isRoute('syllabus.show') }} @if(Request::is('dashboard/class_routines')) {{'active'}} @endif {{ Nav::isRoute('subjects.class') }} {{ Nav::isRoute('subjects.index') }} {{ Nav::isRoute('subjects.create') }} {{ Nav::isRoute('subjects.edit') }}
{{ Nav::isRoute('sections.index') }} {{ Nav::isRoute('sections.edit') }} {{ Nav::isRoute('sections.create') }} {{ Nav::isRoute('assignsubjects.index') }} {{ Nav::isRoute('assignsubjects.create')}} {{ Nav::isRoute('assignsubjects.edit')}}">
    <a href="#">
        <i class="fa fa-university" aria-hidden="true"></i> <span>Academic</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('sections.index') }} {{ Nav::isRoute('sections.edit') }} {{ Nav::isRoute('sections.create') }}">
            <a href="{{route('sections.index')}}"><i class="far fa-circle"></i>Sections</a>
        </li>
        <li class="{{ Nav::isRoute('assignsubjects.index') }} {{ Nav::isRoute('assignsubjects.edit') }} {{ Nav::isRoute('assignsubjects.create') }}">
            <a href="{{route('assignsubjects.index')}}"><i class="far fa-circle"></i>Assign Subjects</a>
        </li>
        <li class="{{ Nav::isRoute('subjects.index') }} {{ Nav::isRoute('subjects.class') }} {{ Nav::isRoute('subjects.edit') }} {{ Nav::isRoute('subjects.create') }}">
            <a href="{{route('subjects.index')}}"><i class="far fa-circle"></i>Subjects</a>
        </li>
        <li class="@if(Request::is('dashboard/class_routines')) {{'active'}} @endif">
            <a href="{{url('dashboard/class_routines')}}"><i class="far fa-circle"></i>Class Routine</a>
        </li>
        <li class="{{ Nav::isRoute('syllabus.index') }} {{ Nav::isRoute('syllabus.create') }} {{ Nav::isRoute('syllabus.edit') }} {{ Nav::isRoute('syllabus.show') }}">
            <a href="{{route('syllabus.index')}}"><i class="far fa-circle"></i>Syllabus</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('assigned.student_show') }} {{ Nav::isRoute('assignments.edit') }} {{ Nav::isRoute('assignments.list') }} {{ Nav::isRoute('assignments.student') }} {{ Nav::isRoute('assignments.student') }} {{ Nav::isRoute('assigned_student.list') }} {{ Nav::isRoute('sharefiles.index') }} {{ Nav::isRoute('sharefiles.create')}} {{ Nav::isRoute('assignments.index')}} {{ Nav::isRoute('assignments.create') }} {{ Nav::isRoute('assignments.show') }}">
    <a href="#">
        <i class="fa fa-hourglass-half"></i> <span>Assignments</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('assignments.index') }} {{ Nav::isRoute('assignments.edit') }} {{ Nav::isRoute('assignments.create') }} {{ Nav::isRoute('assignments.show') }}">
            <a href="{{route('assignments.index')}}"><i class="far fa-circle"></i>Assignments</a>
        </li>
        <li class=" {{ Nav::isRoute('assigned.student_show') }} {{ Nav::isRoute('assignments.list') }} {{ Nav::isRoute('assignments.student') }} {{ Nav::isRoute('assignments.student') }} {{ Nav::isRoute('assigned_student.list') }}">
            <a href="{{route('assignments.student')}}">
                <i class="far fa-circle"></i><span>Assigned Student</span>
            </a>
        </li>
        <li class="{{ Nav::isRoute('sharefiles.index') }} {{ Nav::isRoute('sharefiles.create') }}">
            <a href="{{route('sharefiles.index')}}">
                <i class="far fa-circle"></i> <span>File Share</span>
            </a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('student_attendance.create') }} {{ Nav::isRoute('staff_attendance.create') }}">
    <a href="#">
        <i class="fa fa-calendar-check-o"></i> <span>Attendance</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('student_attendance.create') }}">
            <a href="{{route('student_attendance.create')}}"><i class="far fa-circle"></i>Student Attendance</a>
        </li>
        <li class="{{ Nav::isRoute('staff_attendance.create') }}">
            <a href="{{route('staff_attendance.create')}}"><i class="far fa-circle"></i>Staff Attendance</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('courses.index') }} {{ Nav::isRoute('courses.edit') }} {{ Nav::isRoute('courses.create') }} {{ Nav::isRoute('courses.show') }} {{ Nav::isRoute('coursecomments.index') }} {{ Nav::isRoute('coursecomments.show') }} {{ Nav::isRoute('coursecategories.index') }} {{ Nav::isRoute('coursecategories.edit') }} {{ Nav::isRoute('courseappications.index') }} {{ Nav::isRoute('courseappications.show') }}">
    <a href="#">
        <i class="fa fa-book-reader"></i> <span>Courses</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('courses.create') }} {{ Nav::isRoute('courses.index') }} {{ Nav::isRoute('courses.show') }} {{ Nav::isRoute('courses.edit') }}">
            <a href="{{route('courses.index')}}"><i class="far fa-circle"></i>All Course</a>
        </li>
        <li class="{{ Nav::isRoute('coursecomments.index') }} {{ Nav::isRoute('coursecomments.show') }}">
            <a href="{{route('coursecomments.index')}}"><i class="far fa-circle"></i>Course Comments</a>
        </li>
        <li class="{{ Nav::isRoute('courseappications.index') }} || {{ Nav::isRoute('courseappications.show') }}">
            <a href="{{route('courseappications.index')}}"><i class="far fa-circle"></i>Course Application</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Nav::isRoute('application_requests.index') }} {{ Nav::isRoute('application_requests.show') }}">
    <a href="#">
        <i class="fas fa-paper-plane"></i> <span>Leave Application</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('application_requests.index') }} {{ Nav::isRoute('application_requests.show') }}">
            <a href="{{route('application_requests.index')}}"><i class="far fa-circle"></i>All Application</a>
        </li>
    </ul>
</li>
<li class="treeview {{ nav::isRoute('accounts.show') }} {{ Nav::isRoute('accounts.edit') }} {{ nav::isRoute('accounts.index') }} {{ Nav::isRoute('accounts.create') }}">
    <a href="#">
        <i class="fa fa-university"></i> <span>Bank / Cash Account</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('accounts.index') }} {{ Nav::isRoute('accounts.show') }}">
            <a href="{{route('accounts.index')}}"><i class="far fa-circle"></i>Accounts</a>
        </li>
        <li class="{{ Nav::isRoute('accounts.create') }}">
            <a href="{{route('accounts.create')}}"><i class="far fa-circle"></i>Add New</a>
        </li>
    </ul>
</li>
<li
    class="treeview  {{ Nav::isRoute('transaction_requests.edit') }} {{ Nav::isRoute('transaction_requests.index') }} {{ Nav::isRoute('chart_of_accounts.index') }} {{ Nav::isRoute('chart_of_accounts.show') }} {{ Nav::isRoute('chart_of_accounts.create') }} {{ Nav::isRoute('chart_of_accounts.edit') }} {{ Nav::isRoute('payment_methods.index') }} {{ Nav::isRoute('payment_methods.show') }} {{ Nav::isRoute('payment_methods.create') }} {{ Nav::isRoute('payment_methods.edit') }} {{ Nav::isRoute('payee_payers.index') }} {{ Nav::isRoute('payee_payers.show') }} {{ Nav::isRoute('payee_payers.create') }} {{ Nav::isRoute('payee_payers.edit') }} {{ Nav::isRoute('transactions.show') }} {{ Nav::isRoute('transactions.edit') }} {{ nav::isRoute('transactions.add_expense') }} {{ Nav::isRoute('transactions.add_income') }} {{ nav::isRoute('transactions.manage_expense') }} {{ Nav::isRoute('transactions.manage_income') }}">
    <a href="#">
        <i class="fa fa-money"></i> <span>Transaction</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('transactions.manage_income') }} {{ Nav::isRoute('transactions.add_income') }}">
            <a href="{{route('transactions.manage_income')}}"><i class="far fa-circle"></i>Income</a>
        </li>
        <li class="{{ Nav::isRoute('transactions.manage_expense') }} {{ Nav::isRoute('transactions.add_expense') }}">
            <a href="{{route('transactions.manage_expense')}}"><i class="far fa-circle"></i>Expense</a>
        </li>
        <li class="{{ Nav::isRoute('chart_of_accounts.index') }} {{ Nav::isRoute('chart_of_accounts.show') }} {{ Nav::isRoute('chart_of_accounts.create') }} {{ Nav::isRoute('chart_of_accounts.edit') }}">
            <a href="{{route('chart_of_accounts.index')}}"><i class="far fa-circle"></i>Chart Of Account</a>
        </li>
        <li class="{{ Nav::isRoute('transaction_requests.index') }} {{ Nav::isRoute('transaction_requests.edit') }}">
            <a href="{{route('transaction_requests.index')}}"><i class="far fa-circle"></i>Payment Request</a>
        </li>
        <li class="{{ Nav::isRoute('payment_methods.index') }} {{ Nav::isRoute('payment_methods.show') }} {{ Nav::isRoute('payment_methods.create') }} {{ Nav::isRoute('payment_methods.edit') }}">
            <a href="{{route('payment_methods.index')}}"><i class="far fa-circle"></i>Payment Methods</a>
        </li>
        <li class="{{ Nav::isRoute('payee_payers.index') }} {{ Nav::isRoute('payee_payers.show') }} {{ Nav::isRoute('payee_payers.create') }} {{ Nav::isRoute('payee_payers.edit') }}">
            <a href="{{route('payee_payers.index')}}"><i class="far fa-circle"></i>Payee & Payers</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('fee_types.index') }} {{ Nav::isRoute('fee_types.edit') }} {{ Nav::isRoute('fee_types.create') }} {{ Nav::isRoute('fee_types.edit') }} {{ Nav::isRoute('invoices.create') }} {{ Nav::isRoute('invoices.edit') }} {{ Nav::isRoute('invoices.index') }} {{ Nav::isRoute('student_payments.index') }} {{ Nav::isRoute('student_payments.show') }} {{ Nav::isRoute('student_payments.create') }} {{ Nav::isRoute('student_payments.edit') }}">
    <a href="#">
        <i class="fa fa-credit-card"></i> <span>Student Fees</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('fee_types.index') }} {{ Nav::isRoute('fee_types.edit') }} {{ Nav::isRoute('fee_types.create') }} {{ Nav::isRoute('fee_types.edit') }}">
            <a href="{{route('fee_types.index')}}"><i class="far fa-circle"></i>Fees Type</a>
        </li>
        <li class="{{ Nav::isRoute('invoices.create') }} {{ Nav::isRoute('invoices.edit') }}">
            <a href="{{route('invoices.create')}}"><i class="far fa-circle"></i>Generate Invoice</a>
        </li>
        <li class="{{ Nav::isRoute('invoices.index') }}">
            <a href="{{route('invoices.index')}}"><i class="far fa-circle"></i>Student Invoice</a>
        </li>
        <li class="{{ Nav::isRoute('student_payments.index') }} {{ Nav::isRoute('student_payments.show') }} {{ Nav::isRoute('student_payments.create') }} {{ Nav::isRoute('student_payments.edit') }}">
            <a href="{{route('student_payments.index')}}"><i class="far fa-circle"></i>Payment History</a>
        </li>
    </ul>
</li>
<li class="treeview @if(Request::is('dashboard/exams/attendance')) {{'active'}} @endif @if(Request::is('dashboard/exams/schedule')) {{ 'active' }} @endif @if(Request::is('dashboard/exams/schedule/create')) {{'active'}} @endif {{ Nav::isRoute('exams.index') }} {{ Nav::isRoute('exams.edit') }} {{ Nav::isRoute('exams.create') }}
{{ Nav::isRoute('exams.show') }}">
    <a href="#">
        <i class="fa fa-newspaper-o"></i> <span>Examination</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('exams.create') }} {{ Nav::isRoute('exams.index') }} {{ Nav::isRoute('exams.show') }} {{ Nav::isRoute('exams.edit') }}">
            <a href="{{route('exams.index')}}"><i class="far fa-circle"></i>Exam List</a>
        </li>
        <li class="@if(Request::is('dashboard/exams/schedule/create')) {{ 'active' }} @endif">
            <a href="{{url('dashboard/exams/schedule/create')}}"><i class="far fa-circle"></i>Exam Schedule</a>
        </li>
        <li class="@if(Request::is('dashboard/exams/schedule')) {{ 'active' }} @endif">
            <a href="{{url('dashboard/exams/schedule')}}"><i class="far fa-circle"></i>Exam Routine</a>
        </li>
        <li class="@if(Request::is('dashboard/exams/attendance')) {{'active'}} @endif">
            <a href="{{url('dashboard/exams/attendance')}}"><i class="far fa-circle"></i>Exam Attendance</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ nav::isRoute('marks.show') }} {{ nav::isRoute('marks.view_student_rank') }} {{ Nav::isRoute('marks.create') }} {{ Nav::isRoute('mark_distributions.index') }} {{ Nav::isRoute('grades.index') }} {{ Nav::isRoute('marks.index') }}">
    <a href="#">
        <i class="fa fa-balance-scale"></i> <span>Marks</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('marks.index') }} {{ Nav::isRoute('marks.show') }}">
            <a href="{{route('marks.index')}}"><i class="far fa-circle"></i>Marks</a>
        </li>
        <li class="{{ Nav::isRoute('marks.view_student_rank') }}">
            <a href="{{url('dashboard/marks/rank')}}"><i class="far fa-circle"></i>Student Rank</a>
        </li>
        <li class="{{ Nav::isRoute('marks.create') }}">
            <a href="{{url('dashboard/marks/create')}}"><i class="far fa-circle"></i>Mark Register</a>
        </li>
        <li class="{{ Nav::isRoute('grades.index') }}">
            <a href="{{route('grades.index')}}"><i class="far fa-circle"></i>Grade Setup</a>
        </li>
        <li class="{{ Nav::isRoute('mark_distributions.index') }}">
            <a href="{{route('mark_distributions.index')}}"><i class="far fa-circle"></i>Mark Distribution</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Nav::isRoute('messages.compose') }} {{ Nav::isRoute('messages.outbox') }} {{ Nav::isRoute('messages.inbox') }} {{ Nav::isRoute('messages.show_inbox') }} {{ Nav::isRoute('messages.show_outbox') }}">
    <a href="#">
        <i class="fa fa-envelope-open"></i> <span>Message</span> {!! count_inbox() > 0 ? '<span class="label label-danger inbox-count">'.count_inbox().'</span>' : '' !!}
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('messages.compose') }}">
            <a href="{{route('messages.compose')}}"><i class="far fa-circle"></i>New Message</a>
        </li>
        <li class="{{ Nav::isRoute('messages.inbox') }} {{ Nav::isRoute('messages.show_inbox') }}">
            <a href="{{route('messages.inbox')}}"><i class="far fa-circle"></i>Inbox Items</a>
        </li>
        <li class="{{ Nav::isRoute('messages.outbox') }} {{ Nav::isRoute('messages.show_outbox') }}">
            <a href="{{route('messages.outbox')}}"><i class="far fa-circle"></i>Send Items</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Nav::isRoute('notices.index') }} {{ Nav::isRoute('notices.edit') }} {{ Nav::isRoute('notices.create') }}">
    <a href="#">
        <i class="fa fa-bell"></i> <span>Notices</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('notices.create') }}">
            <a href="{{route('notices.create')}}"><i class="far fa-circle"></i>New Notice</a>
        </li>
        <li class="{{ Nav::isRoute('notices.index') }} {{ Nav::isRoute('notices.edit') }}">
            <a href="{{route('notices.index')}}"><i class="far fa-circle"></i>All Notice</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('speakers.index') }} || {{ Nav::isRoute('speakers.edit') }} || {{ Nav::isRoute('speakers.create') }} || {{ Nav::isRoute('candidates.index') }} || {{ Nav::isRoute('events.index') }} || {{ Nav::isRoute('events.calendar') }} || {{ Nav::isRoute('events.show') }} || {{ Nav::isRoute('events.edit') }} || {{ Nav::isRoute('events.create') }}">
    <a href="#">
        <i class="fa fa-calendar"></i> <span>Events</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('events.create') }} {{ Nav::isRoute('events.index') }} {{ Nav::isRoute('candidates.index') }} {{ Nav::isRoute('events.show') }} {{ Nav::isRoute('events.edit') }}">
            <a href="{{route('events.index')}}"><i class="far fa-circle"></i>All Events</a>
        </li>
        <li class="{{ Nav::isRoute('events.calendar') }}">
            <a href="{{route('events.calendar')}}"><i class="far fa-circle"></i>Event Calendar</a>
        </li>
        <li class="{{ Nav::isRoute('speakers.index') }} || {{ Nav::isRoute('speakers.edit') }} || {{ Nav::isRoute('speakers.create') }}">
            <a href="{{route('speakers.index')}}"><i class="far fa-circle"></i>Event Speaker</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Nav::isRoute('jobs.index') }} {{ Nav::isRoute('jobs.edit') }} {{ Nav::isRoute('jobs.create') }} {{ Nav::isRoute('jobs.show') }} {{ Nav::isRoute('jobappications.index') }} {{ Nav::isRoute('jobappications.show') }}">
    <a href="#">
        <i class="fas fa-briefcase"></i> <span style="padding-left:5px;">Jobs</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('jobs.create') }} {{ Nav::isRoute('jobs.index') }} {{ Nav::isRoute('jobs.edit') }} {{ Nav::isRoute('jobs.show') }}">
            <a href="{{route('jobs.index')}}"><i class="far fa-circle"></i>All Jobs</a>
        </li>
        <li class="{{ Nav::isRoute('jobappications.index') }} {{ Nav::isRoute('jobappications.show') }}">
            <a href="{{route('jobappications.index')}}"><i class="far fa-circle"></i>All Candidate</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('news.show') }} {{ Nav::isRoute('news.create') }} {{ Nav::isRoute('news.index') }} {{ Nav::isRoute('news.edit') }} {{ Nav::isRoute('categories.index') }} {{ Nav::isRoute('categories.edit') }} {{ Nav::isRoute('comments.index') }}">
    <a href="#">
        <i class="fas fa-blog"></i> <span style="padding-left:5px;"> News</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('news.index') }} {{ Nav::isRoute('news.show') }} {{ Nav::isRoute('news.create') }} {{ Nav::isRoute('news.edit') }}">
            <a href="{{route('news.index')}}"><i class="far fa-circle"></i> All News</a>
        </li>
        <li class="{{ Nav::isRoute('comments.index') }}">
            <a href="{{route('comments.index')}}"><i class="far fa-circle"></i> Comments</a>
        </li>
        <li class="{{ Nav::isRoute('categories.index') }} {{ Nav::isRoute('categories.edit') }}">
            <a href="{{route('categories.index')}}"><i class="far fa-circle"></i> Category</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('folders.index') }} {{ Nav::isRoute('folders.edit') }} {{ Nav::isRoute('galleries.index') }} {{ Nav::isRoute('galleries.show') }} {{ Nav::isRoute('galleries.edit') }}">
    <a href="#">
        <i class="fa fa-picture-o"></i> Album</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('galleries.index') }} {{ Nav::isRoute('galleries.edit') }} {{ Nav::isRoute('galleries.show') }}">
            <a href="{{route('galleries.index')}}"><i class="far fa-circle"></i> Gallery</a>
        </li>
        <li class="{{ Nav::isRoute('folders.index') }} {{ Nav::isRoute('folders.edit') }}">
            <a href="{{route('folders.index')}}"><i class="far fa-circle"></i> All Folders</a>
        </li>
    </ul>
</li>

<li
    class="treeview {{ Nav::isRoute('team_members.show') }} {{ Nav::isRoute('team_members.index') }} {{ Nav::isRoute('team_members.create') }} {{ Nav::isRoute('team_members.edit') }} {{ Nav::isRoute('team_categories.edit') }} {{ Nav::isRoute('team_categories.index') }}">
    <a href="#">
        <i class="fas fa-user-friends"></i> <span>Team Member</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('team_members.index') }} {{ Nav::isRoute('team_members.edit') }} {{ Nav::isRoute('team_members.create') }}">
            <a href="{{route('team_members.index')}}"><i class="far fa-circle"></i> Member List</a>
        </li>
        <li class="{{ Nav::isRoute('team_categories.index') }} {{ Nav::isRoute('team_categories.edit') }}">
            <a href="{{route('team_categories.index')}}"><i class="far fa-circle"></i> Position Category</a>
        </li>
    </ul>
</li>

<li
    class="treeview {{ Nav::isRoute('downloads.index') }} {{ Nav::isRoute('downloads.show') }} {{ Nav::isRoute('downloads.create') }} {{ Nav::isRoute('downloads.edit') }} {{ Nav::isRoute('journey.index') }} {{ Nav::isRoute('benefits.index') }} {{ Nav::isRoute('sliders.index') }} {{ Nav::isRoute('sliders.create') }} {{ Nav::isRoute('sliders.edit') }} {{ Nav::isRoute('plugins.index') }} {{ Nav::isRoute('plugins.edit') }} {{ Nav::isRoute('plugins.create') }}">
    <a href="#">
        <i class="fa fa-th-large"></i> <span>Element</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('sliders.index') }} {{ Nav::isRoute('sliders.create') }} {{ Nav::isRoute('sliders.edit') }}">
            <a href="{{route('sliders.index')}}"><i class="far fa-circle"></i> Slider</a>
        </li>
        <li class="{{ Nav::isRoute('downloads.index') }} {{ Nav::isRoute('downloads.show') }} {{ Nav::isRoute('downloads.create') }} {{ Nav::isRoute('downloads.edit') }}">
            <a href="{{route('downloads.index')}}"><i class="far fa-circle"></i> Download</a>
        </li>
        <li class="{{ Nav::isRoute('plugins.index') }} {{ Nav::isRoute('plugins.edit') }} {{ Nav::isRoute('plugins.create') }}">
            <a href="{{route('plugins.index')}}"><i class="far fa-circle"></i> Plugins</a>
        </li>
        <li class="{{ Nav::isRoute('benefits.index') }}">
            <a href="{{route('benefits.index')}}"><i class="far fa-circle"></i> Why Choose Us</a>
        </li>
        <li class="{{ Nav::isRoute('journey.index') }}">
            <a href="{{route('journey.index')}}"><i class="far fa-circle"></i> About Us</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('abouts.objective') }} {{ Nav::isRoute('abouts.placement') }} {{ Nav::isRoute('abouts.introduction') }} {{ Nav::isRoute('abouts.facility') }} {{ Nav::isRoute('abouts.director') }}">
    <a href="#">
        <i class="fa fa-address-card"></i> <span>Pages</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('abouts.introduction') }}">
            <a href="{{route('abouts.introduction')}}"><i class="far fa-circle"></i> Introduction</a>
        </li>
        <li class="{{ Nav::isRoute('abouts.facility') }}">
            <a href="{{route('abouts.facility')}}"><i class="far fa-circle"></i> Facility & Resources</a>
        </li>
        <li class="{{ Nav::isRoute('abouts.director') }}">
            <a href="{{route('abouts.director')}}"><i class="far fa-circle"></i> Message From the Director</a>
        </li>
        <li class="{{ Nav::isRoute('abouts.placement') }}">
            <a href="{{route('abouts.placement')}}"><i class="far fa-circle"></i> Placement Support Unit</a>
        </li>
        <li class="{{ Nav::isRoute('abouts.objective') }}">
            <a href="{{route('abouts.objective')}}"><i class="far fa-circle"></i> Our Objective, Mission & Vision</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('email.index') }} {{ Nav::isRoute('email.history') }} {{ Nav::isRoute('email.detail') }}">
    <a href="#">
        <i class="far fa-envelope"></i> <span style="padding-left:5px">Email</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('email.index') }}">
            <a href="{{route('email.index')}}"><i class="far fa-circle"></i> Send Email</a>
        </li>
        <li class="{{ Nav::isRoute('email.history') }}">
            <a href="{{route('email.history')}}"><i class="far fa-circle"></i> Mail History</a>
        </li>
        <li class="{{ Nav::isRoute('email.detail') }}">
            <a href="{{route('email.detail')}}"><i class="far fa-circle"></i> Mail Settings</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('reports.student_id_card') }} {{ Nav::isRoute('reports.exam_report') }} {{ Nav::isRoute('reports.progress_card') }} {{ Nav::isRoute('reports.class_routine') }} {{ Nav::isRoute('reports.exam_routine') }} {{ Nav::isRoute('reports.income_report') }} {{ Nav::isRoute('reports.expense_report') }} {{ Nav::isRoute('reports.account_balance') }} {{ Nav::isRoute('reports.student_attendance_report') }} {{ Nav::isRoute('reports.staff_attendance_report') }}">
    <a href="#">
        <i class="fa fa-bar-chart"></i> <span>Reports</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('reports.student_attendance_report') }}">
            <a href="{{route('reports.student_attendance_report')}}"><i class="far fa-circle"></i>Student Attendance</a>
        </li>
        <li class="{{ Nav::isRoute('reports.staff_attendance_report') }}">
            <a href="{{route('reports.staff_attendance_report')}}"><i class="far fa-circle"></i>Staff Attendance</a>
        </li>
        <li class="{{ Nav::isRoute('reports.student_id_card') }}">
            <a href="{{route('reports.student_id_card')}}"><i class="far fa-circle"></i>Student Id Card</a>
        </li>
        <li class="{{ Nav::isRoute('reports.exam_report') }}">
            <a href="{{route('reports.exam_report')}}"><i class="far fa-circle"></i>Exam Report</a>
        </li>
        <li class="{{ Nav::isRoute('reports.progress_card') }}">
            <a href="{{route('reports.progress_card')}}"><i class="far fa-circle"></i>Progress Card</a>
        </li>
        <li class="{{ Nav::isRoute('reports.class_routine') }}">
            <a href="{{route('reports.class_routine')}}"><i class="far fa-circle"></i>Class Routine</a>
        </li>
        <li class="{{ Nav::isRoute('reports.exam_routine') }}">
            <a href="{{route('reports.exam_routine')}}"><i class="far fa-circle"></i>Exam Routine</a>
        </li>
        <li class="{{ Nav::isRoute('reports.income_report') }}">
            <a href="{{route('reports.income_report')}}"><i class="far fa-circle"></i>Income Report</a>
        </li>
        <li class="{{ Nav::isRoute('reports.expense_report') }}">
            <a href="{{route('reports.expense_report')}}"><i class="far fa-circle"></i>Expense Report</a>
        </li>
        <li class="{{ Nav::isRoute('reports.account_balance') }}">
            <a href="{{route('reports.account_balance')}}"><i class="far fa-circle"></i>Financial Account Balance</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('general_settings.index') }} {{ Nav::isRoute('picklists.index') }} {{ Nav::isRoute('picklists.create') }} {{ Nav::isRoute('picklists.show') }} {{ Nav::isRoute('picklists.edit') }} {{ Nav::isRoute('academic_years.show') }} {{ Nav::isRoute('academic_years.index') }} {{ Nav::isRoute('academic_years.create') }} {{ Nav::isRoute('academic_years.edit') }}">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>Admininstration</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('general_settings.index') }}">
            <a href="{{route('general_settings.index')}}"><i class="far fa-circle"></i>System Setting</a>
        </li>
        <li class="{{ Nav::isRoute('academic_years.show') }} {{ Nav::isRoute('academic_years.index') }} {{ Nav::isRoute('academic_years.create') }} {{ Nav::isRoute('academic_years.edit') }}">
            <a href="{{route('academic_years.index')}}"><i class="far fa-circle"></i>Academic Session</a>
        </li>
        <li class="{{ Nav::isRoute('picklists.index') }} {{ Nav::isRoute('picklists.create') }} {{ Nav::isRoute('picklists.show') }} {{ Nav::isRoute('picklists.edit') }}">
            <a href="{{route('picklists.index')}}"><i class="far fa-circle"></i>Religion</a>
        </li>
        <li class="{{ Nav::isRoute('utility.backup_database') }}">
            <a href="{{route('utility.backup_database')}}"><i class="far fa-circle"></i>Database Backup</a>
        </li>
    </ul>
</li>
<li class="{{ Nav::isRoute('users.index') }} || {{ Nav::isRoute('users.create') }} || {{ Nav::isRoute('users.edit') }} {{ Nav::isRoute('users.show') }}">
    <a href="{{ route('users.index') }}" title="User Management">
        <i class="fa fa-users"></i> <span>User Management</span>
    </a>
</li>
@endrole