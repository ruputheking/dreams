@role('student')
<!-- Optionally, you can add icons to the links -->
<li class="{{ Nav::isRoute('dashboard') }}">
    <a href="{{ route('dashboard') }}" title="Dashboard">
        <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
    </a>
</li>
<li class="treeview {{ Nav::isRoute('student.my_assignment') }} {{ Nav::isRoute('student.view_assignment') }} {{ Nav::isRoute('student.submit_assignment') }} {{ Nav::isRoute('student.sharefile') }}">
    <a href="#">
        <i class="fa fa-hourglass-half"></i> <span>Academic Assignment</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('student.my_assignment') }}">
            <a href="{{route('student.my_assignment')}}"><i class="far fa-circle"></i>Assignments</a>
        </li>
        <li class="{{ Nav::isRoute('student.sharefile') }}">
            <a href="{{route('student.sharefile')}}"><i class="far fa-circle"></i>Shared File</a>
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
<li class="{{ Nav::isRoute('student.my_syllabus') }} {{ Nav::isRoute('student.view_syllabus') }}">
    <a href="{{route('student.my_syllabus')}}" title="Academic Syllabus">
        <i class="fa fa-book"></i> <span>Academic Syllabus</span>
    </a>
</li>
<li class="{{ Nav::isRoute('student.my_profile') }}">
    <a href="{{ route('student.my_profile') }}" title="Dashboard">
        <i class="fas fa-user-circle"></i> <span style="padding-left:5px;">My Profile</span>
    </a>
</li>
<li class="{{ Nav::isRoute('student.my_subjects') }}">
    <a href="{{route('student.my_subjects')}}" title="My Subjects">
        <i class="fa fa-book"></i> <span>My Subjects</span>
    </a>
</li>
<li class="{{ Nav::isRoute('student.class_routine') }}">
    <a href="{{route('student.class_routine')}}" title="Class Routine">
        <i class="fa fa-calendar-alt"></i> <span>Class Routine</span>
    </a>
</li>
<li class="{{ Nav::isRoute('student.exam_routine') }}">
    <a href="{{route('student.exam_routine')}}" title="Exam Routine">
        <i class="fa fa-calendar-alt"></i> <span>Exam Routine</span>
    </a>
</li>
<li class="{{ Nav::isRoute('student.progress_card') }}">
    <a href="{{route('student.progress_card')}}" title="Progress Card">
        <i class="fa fa-bar-chart"></i> <span>Progress Card</span>
    </a>
</li>
<li class="treeview {{ Nav::isRoute('student.paypal') }} {{ Nav::isRoute('student.my_invoice') }} {{ Nav::isRoute('student.view_invoice') }} {{ Nav::isRoute('student.invoice_payment') }}">
    <a href="#">
        <i class="fa fa-file-alt"></i> <span>My Invoice</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="@if(Request::is('dashboard/student/my_invoice')) {{'active'}} @endif">
            <a href="{{route('student.my_invoice')}}"><i class="far fa-circle"></i>Unpaid Invoice</a>
        </li>
        <li class="@if(Request::is('dashboard/student/my_invoice/paid')) {{'active'}} @endif">
            <a href="{{url('dashboard/student/my_invoice/paid')}}"><i class="far fa-circle"></i>Paid Invoice</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Nav::isRoute('student.payment_history') }} {{ Nav::isRoute('payment_requests.index') }}">
    <a href="#">
        <i class="fa fa-cc"></i> <span>Transactions</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('payment_requests.index') }}">
            <a href="{{route('payment_requests.index')}}" title="Payment History">
                <i class="far fa-circle"></i> <span>Payment Request</span>
            </a>
        </li>
        <li class="{{ Nav::isRoute('student.payment_history') }}">
            <a href="{{route('student.payment_history')}}" title="Payment History">
                <i class="far fa-circle"></i> <span>Payment History</span>
            </a>
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