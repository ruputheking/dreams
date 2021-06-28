<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="margin-top:-68px;">
            <div class="pull-left info">
                <h4>{{ get_option('welcome_txt') }}</h4>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main</li>

            @include('layouts.backend.menu.admin')
            @include('layouts.backend.menu.users')
            @include('layouts.backend.menu.student')
            @include('layouts.backend.menu.teacher')
            @include('layouts.backend.menu.accountant')
            @include('layouts.backend.menu.receptionist')
            @include('layouts.backend.menu.parent')

            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();" title=" Logout">
                    <i class="fa fa-sign-out-alt"></i> <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

            {{-- <li><a href="{{url('/admin/payment')}}" title="Payment History"><i class="fa fa-money"></i> <span>Payment History</span></a></li> --}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>