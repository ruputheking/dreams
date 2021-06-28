@role('guardian')
<!-- Optionally, you can add icons to the links -->
<li class="{{ Nav::isRoute('dashboard') }}">
    <a href="{{ route('dashboard') }}" title="Dashboard">
        <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
    </a>
</li>
<li class="{{ Nav::isRoute('parent.my_profile') }}">
    <a href="{{ route('parent.my_profile') }}" title="Dashboard">
        <i class="fas fa-user-circle"></i> <span style="padding-left:5px;">My Profile</span>
    </a>
</li>
{!! get_children('My Children', 'dashboard/parent/my_children', 'fa fa-users') !!}
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