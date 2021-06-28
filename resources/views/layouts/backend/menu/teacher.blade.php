@role(['teacher'])
<!-- Optionally, you can add icons to the links -->
<li class="@if(request()->url() == route('dashboard')) {{ 'active' }} @endif">
    <a href="{{ route('dashboard') }}" title="Dashboard"><i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
</li>
<li class="@if(request()->url() == route('teacher.my_profile')) {{'active'}} @endif">
    <a href="{{route('teacher.my_profile')}}" title="My Profile">
        <i class="fas fa-user-circle"></i> <span style="padding-left:5px;">My Profile</span>
    </a>
</li>
<li class="@if(request()->url() == route('teacher.my_subjects')) {{'active'}} @endif">
    <a href="{{route('teacher.my_subjects')}}" title="My Subjects">
        <i class="fa fa-book"></i> <span>My Subjects</span>
    </a>
</li>
<li class="{{ Nav::isRoute('teacher.my_students') }}">
    <a href="{{route('teacher.my_students')}}" title="My Subjects">
        <i class="fa fa-user"></i> <span>My Student</span>
    </a>
</li>
<li class="{{ Nav::isRoute('teacher.class_schedule') }}">
    <a href="{{route('teacher.class_schedule')}}" title="Class Routine">
        <i class="fa fa-calendar"></i> <span>Class Routine</span>
    </a>
</li>
<li class="{{ Nav::isRoute('teacher.mark_register') }} {{ Nav::isRoute('teacher.create_mark') }}">
    <a href="{{route('teacher.mark_register')}}" title="Mark Register">
        <i class="fa fa-balance-scale"></i> <span>Mark Register</span>
    </a>
</li>
<li
    class="treeview {{ Nav::isRoute('assigned_student.show') }} {{ Nav::isRoute('assign_student.list') }} {{ Nav::isRoute('assigned_student.list') }} {{ Nav::isRoute('teacher.assignments') }} {{ Nav::isRoute('teacher.create_assignment') }} {{ Nav::isRoute('teacher.edit_assignment') }} {{ Nav::isRoute('teacher.show_assignment') }} {{ Nav::isRoute('sharefiles.index') }} {{ Nav::isRoute('sharefiles.create') }}">
    <a href="#">
        <i class="fa fa-hourglass-half"></i> <span>Assignments</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('teacher.assignments') }} {{ Nav::isRoute('teacher.create_assignment') }} {{ Nav::isRoute('teacher.edit_assignment') }} {{ Nav::isRoute('teacher.show_assignment') }}">
            <a href="{{route('teacher.assignments')}}" title="Assignments">
                <i class="far fa-circle"></i> <span> Assignments</span>
            </a>
        </li>
        <li class="{{ Nav::isRoute('assign_student.list') }} {{ Nav::isRoute('assigned_student.show') }} {{ Nav::isRoute('assigned_student.list') }}">
            <a href="{{route('assign_student.list')}}">
                <i class="far fa-circle"></i><span>Assigned Student</span>
            </a>
        </li>
        <li class="{{ Nav::isRoute('sharefiles.index') }} {{ Nav::isRoute('sharefiles.create') }}">
            <a href="{{route('sharefiles.index')}}">
                <i class="far fa-circle"></i> <span>Share File</span>
            </a>
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