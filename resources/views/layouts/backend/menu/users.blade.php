@role('user')
<!-- Optionally, you can add icons to the links -->
<li class="{{ Nav::isRoute('dashboard') }}">
    <a href="{{ route('dashboard') }}" title="Dashboard">
        <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
    </a>
</li>
<li class="{{ Nav::isRoute('notifications.index') }}">
    <a href="{{ route('notifications.index') }}">
        <i class="far fa-bell"></i> <span style="padding-left:5px">Notification</span> <span style="color:white;margin-left:10px;border-radius:10px 10px;padding:1px 7px;"> {{ get_user_notification()->count() }}</span>
    </a>
</li>
<li class="treeview {{ Nav::isRoute('user_requests.index') }} {{ Nav::isRoute('user_requests.edit') }} {{ Nav::isRoute('user_requests.show') }} {{ Nav::isRoute('user_requests.create') }}">
    <a href="#">
        <i class="fab fa-accusoft"></i> <span>Send Request</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @php
            $student = App\Models\StudentRequest::where('author_id', Auth::user()->id)->first();
        @endphp
        @if(! $student)
            <li class="{{ Nav::isRoute('user_requests.create') }}">
                <a href="{{route('user_requests.create')}}"><i class="far fa-circle"></i>Verify for Student</a>
            </li>
        @endif
        
        <li class="{{ Nav::isRoute('user_requests.index') }} {{ Nav::isRoute('user_requests.edit') }} {{ Nav::isRoute('user_requests.show') }}">
            <a href="{{route('user_requests.index')}}"><i class="far fa-circle"></i>Request List</a>
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