@role('accountant')
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
<li class="treeview {{ Nav::isRoute('courses.index') }} {{ Nav::isRoute('courses.edit') }} {{ Nav::isRoute('courses.create') }} {{ Nav::isRoute('courses.show') }}">
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
    class="treeview {{ Nav::isRoute('transaction_requests.index') }} {{ Nav::isRoute('transaction_requests.edit') }} {{ Nav::isRoute('chart_of_accounts.index') }} {{ Nav::isRoute('chart_of_accounts.show') }} {{ Nav::isRoute('chart_of_accounts.create') }} {{ Nav::isRoute('chart_of_accounts.edit') }} {{ Nav::isRoute('payment_methods.index') }} {{ Nav::isRoute('payment_methods.show') }} {{ Nav::isRoute('payment_methods.create') }} {{ Nav::isRoute('payment_methods.edit') }} {{ Nav::isRoute('payee_payers.index') }} {{ Nav::isRoute('payee_payers.show') }} {{ Nav::isRoute('payee_payers.create') }} {{ Nav::isRoute('payee_payers.edit') }} {{ Nav::isRoute('transactions.show') }} {{ Nav::isRoute('transactions.edit') }} {{ nav::isRoute('transactions.add_expense') }} {{ Nav::isRoute('transactions.add_income') }} {{ nav::isRoute('transactions.manage_expense') }} {{ Nav::isRoute('transactions.manage_income') }}">
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
<li
    class="treeview {{ Nav::isRoute('reports.exam_report') }} {{ Nav::isRoute('reports.progress_card') }} {{ Nav::isRoute('reports.class_routine') }} {{ Nav::isRoute('reports.exam_routine') }} {{ Nav::isRoute('reports.income_report') }} {{ Nav::isRoute('reports.expense_report') }} {{ Nav::isRoute('reports.account_balance') }} {{ Nav::isRoute('reports.student_attendance_report') }} {{ Nav::isRoute('reports.staff_attendance_report') }}">
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
<li class="treeview {{ Nav::isRoute('applications.index') }} {{ Nav::isRoute('applications.show') }} {{ Nav::isRoute('applications.edit') }} {{ Nav::isRoute('applications.create') }}">
    <a href="#">
        <i class="fas fa-paper-plane"></i> <span>Application</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('applications.index') }} {{ Nav::isRoute('applications.show') }}">
            <a href="{{route('applications.index')}}"><i class="far fa-circle"></i>All Application</a>
        </li>
        <li class="{{ Nav::isRoute('applications.create') }} {{ Nav::isRoute('applications.edit') }}">
            <a href="{{route('applications.create')}}"><i class="far fa-circle"></i>Apply Leave</a>
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
@endrole