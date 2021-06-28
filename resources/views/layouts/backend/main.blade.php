<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="/frontend/favicon.ico" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="/frontend/css/custom-bootstrap-margin-padding.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link href="{{ asset('backend') }}/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/css/metisMenu.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <!-- Admin Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('css/skin-black.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-iconpicker.min.css')}}">
    <link href="{{ asset('backend') }}/css/nice-select.css" rel="stylesheet">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <!-- Dropify library -->
    <link href="{{ asset('backend') }}/css/dropify.min.css" rel="stylesheet" />
    <!-- DataTable -->
    <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap.min.css')}}">
    <!--  Quill editor    -->
    <link href="{{ asset('backend') }}/css/summernote.css" rel="stylesheet" />
    <link rel="stylesheet" href="/backend/css/themify-icons.css">
    <!--  Notifications Plugin    -->
    <link href="{{ asset('backend') }}/css/toastr.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/fullcalendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/backend/plugins/font-awesome/font-awesome.min.css">
    <script src="/backend/plugins/font-awesome/a076d05399.js"></script>
    <!-- Animation library for notifications   -->
    <link href="{{ asset('backend') }}/css/animate.min.css" rel="stylesheet" />
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="/backend/css/custom.css">
    <style media="screen">
        .breadcrumb {
            margin: 0px;
            padding: 14px 10px;
            font-size: 16px;
            background: none;
        }

        .treeview-menu i {
            padding-right: 5px;
        }

        .select_class {
            padding: 3px 10px;
            margin: 10px;
            border-radius: 26px;
            display: inline-block;
            border: 2px solid #007bff;
            outline: none;
            font-weight: 500;
            color: #007bff;
        }
    </style>
    @yield('styles')
</head>

<body class="hold-transition skin-black sidebar-mini">
    <!-- Main Modal -->
    <div id="main_modal" class="modal animated bounceInDown" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="modal-btn btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Exit</button>
                    <button type="button" id="modal-fullscreen" class="modal-btn btn btn-primary btn-sm pull-right" style="margin-right: 10px"><i class="glyphicon glyphicon-fullscreen"></i> Full Screen</button>
                    <h5 class="modal-title"></h5>
                </div>
                <div class="alert alert-danger" style="display:none; margin: 15px;"></div>
                <div class="alert alert-success" style="display:none; margin: 15px;"></div>
                <div class="modal-body" style="overflow:hidden;"></div>
            </div>

        </div>
    </div>
    <div id="preloader">
        <div class="bar"></div>
    </div>
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <a href="{{url('/')}}" class="btn visit-btn" title="Visit Site">Visit Site <i class="fa fa-arrow-circle-o-right"></i></a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    @if (Auth::user()->photo)
                    <img src="/frontend/images/{{Auth::user()->photo}}" class="pull-left mt-2 rounded hidden-xs" style="border-radius:50%;margin-right:10px;margin-top:7px;border:1px solid #ddd;" width="35" height="35">
                    @else
                    <img src="/frontend/images/profile.png" class="pull-left mt-2 rounded hidden-xs" style="border-radius:50%;margin-right:10px;margin-top:7px;border:1px solid #ddd;" width="35" height="35">
                    @endif
                    <ul class="nav navbar-nav">
                        @role(['admin', 'accountant', 'receptionist'])
                        <li class="top hidden-xs">
                            <select class="select_class" onchange="changeSession(this);">
                                @foreach(\App\Models\AcademicYear::orderBy('id', 'asc')->get() as $session)
                                <option value="{{ $session->id }}" {{ $session->id == get_option('academic_years') ? "selected" : "" }}>{{ 'Session' }} ({{ $session->year }})</option>
                                @endforeach
                            </select>
                        </li>
                        @endrole
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p style="margin:0;">{!! count_inbox() > 0 ? '<span class="notification-count label-danger">'.count_inbox().'</span>' : "" !!} {{ ('Message') }} <i class="caret"></i></p>

                            </a>
                            <ul class="dropdown-menu notification-items">
                                @foreach(inbox_items() as $message)
                                <li><a class="ajax-modal" href="{{ url('dashboard/message/inbox/'.$message->id) }}">{{ $message->subject }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">Hi, {{Auth::user()->user_name}}</span>
                                <i class="fa fa-user hidden-lg hidden-md hidden-sm"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Body -->
                                <li>
                                    <a href="{{route('profile.index')}}" title="Profile">Profile</a>
                                </li>
                                <li>
                                    <a href="{{route('profile.edit')}}" title="Profile">Update Profile</a>
                                </li>
                                <li>
                                    <a href="{{route('profile.password')}}" title="Profile">Change Password</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" title="Logout" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @include('layouts.backend.navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <ol class="breadcrumb text-right" style="margin-bottom: -10px;">
                        @yield('header')
                    </ol>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content container-fluid">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>
                {!! get_option('copyright') !!}
            </strong>
        </footer>
    </div>

    <script src="{{asset('backend/js/jquery.min.js')}}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="/backend/js/echarts.min.js"></script>
    <!--  Dropify  -->
    <script type="text/javascript" src="{{ asset('backend') }}/js/dropify.min.js"></script>
    <!-- Select2 -->
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/js/bootstrap-datepicker.js"></script>
    <!-- DataTable -->
    <script src="/backend/js/jquery.dataTables.min.js"></script>
    <script src="/backend/js/jquery.nestable.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/adminlte.min.js')}}"></script>
    <script src="{{asset('js/fontawesome-iconpicker.min.js')}}"></script>
    <!--  Bootstrap Datepicker  -->
    <script src="{{ asset('backend') }}/js/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>

    <script src="{{ asset('backend') }}/js/metisMenu.min.js"></script>
    <!--  Summernote editor    -->
    <script type="text/javascript" src="{{ asset('backend') }}/js/summernote.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/js/toastr.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/js/print.js"></script>
    <script src="/backend/plugins/tinymce/tinymce.min.js"></script>
    <!--  jQuery Validation   -->
    <script type="text/javascript" src="{{ asset('backend') }}/js/jquery.validate.min.js"></script>
    <!--  Notifications Plugin    -->
    <script type="text/javascript" src="{{ asset('backend') }}/js/bootstrap-notify.js"></script>
    <script src="/backend/js/dashboard.js" charset="utf-8"></script>
    @yield('scripts')
    @include('layouts.backend.script')
    <script src="/js/script.js" charset="utf-8"></script>
    <script type="text/javascript">
        function changeSession(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('dashboard/administration/change_session') ?>/" + $(elem).val();
        }
    </script>
</body>

</html>