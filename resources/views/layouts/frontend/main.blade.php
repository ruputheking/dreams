<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- Page Title -->
    <title>@yield('title') {{get_option('title')}}</title>
    @if (!(Nav::isRoute('event.register') || Nav::isRoute('course.register') || Nav::isRoute('job.show') || Nav::isRoute('job.create') || Nav::isRoute('course.show') || Nav::isRoute('event.show') || Nav::isRoute('notice.show') ||
    Nav::isRoute('blog.show')))
    <meta name="keywords" content="{{ get_option('seo_meta_keywords') }}">
    <meta name="description" content="{{ get_option('seo_meta_description') }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ get_option('seo_meta_keywords') }}">
    <meta name="twitter:description" content="{{ get_option('seo_meta_description') }}">
    <meta name="twitter:image" content="{{ asset('/frontend/images/'. get_option('image')) }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="{{ get_option('seo_meta_keywords') }}">
    <meta property="og:description" content="{{ get_option('seo_meta_description') }}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ asset('/frontend/images/'. get_option('image')) }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1000">
    <meta property="og:image:height" content="500">
    @endif
    @yield('meta')
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
    <link rel="shortcut icon" href="/frontend/favicon.ico" type="image/x-icon">
    <!-- Stylesheet -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/css-plugin-collections.css" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link href="/frontend/css/menuzord-megamenu.css" rel="stylesheet" />
    <link id="menuzord-menu-skins" href="/frontend/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />
    <!-- CSS | Main style file -->
    <link href="/frontend/css/style-main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/frontend/css/style-menu.min.css">
    <!-- CSS | Preloader Styles -->
    <link href="/frontend/css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="/frontend/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="/frontend/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <link href="/frontend/css/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Revolution Slider 5.x CSS settings -->
    <link href="/frontend/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
    <link href="/frontend/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css" />
    <link href="/frontend/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css" />

    <!-- CSS | Theme Color -->
    <link href="/frontend/css/colors/theme-skin-color-set2.css" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="/frontend/js/jquery-2.2.4.min.js"></script>
    <script src="/frontend/js/jquery-ui.min.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="/frontend/js/jquery-plugin-collection.js"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="/frontend/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="/frontend/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    <!--  Notifications Plugin    -->
    <link href="{{ asset('backend') }}/css/toastr.css" rel="stylesheet">
    @foreach (get_plugins() as $data)
    {!! $data->code !!}
    @endforeach

</head>

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        {{-- <div id="preloader">
            <div id="spinner">
                <img alt="" src="/frontend/images/preloaders/5.gif">
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div> --}}

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-theme-colored2 sm-text-center">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">
                        <ul class="list-inline xs-text-center text-white">
                            <li class="m-0 pt-10 pl-10 pr-10"><i class="fa fa-phone text-white"></i> {{ get_option('official_phone') }} </li>
                            <li class="m-0 pt-10 pl-10 pr-10"><i class="fa fa-envelope-o text-white mr-5"></i> {{ get_option('official_email') }}</li>
                        </ul>
                        </p>
                    </div>
                    <div class="header-right">
                        <!-- End of DropDown Menu -->
                        <div class="dropdown dropdown-expanded d-lg-show">
                            <a href="#dropdown">Links</a>
                            <ul class="dropdown-box">
                                <li><a href="{{ route('pages.admission') }}">Admission</a></li>
                                <li><a href="{{ route('pages.job') }}">Jobs</a></li>
                                <li><a href="{{ route('pages.faq') }}">FAQs</a></li>
                                <li><a href="{{ route('pages.download') }}">Download</a></li>
                            </ul>
                        </div>
                        <!-- End of DropDownExpanded Menu -->
                    </div>
                </div>
            </div>
            <div class="header-middle sticky-header fix-top sticky-content has-center">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="{{ route('pages.home') }}" class="logo d-none d-lg-block">
                            <img src="/frontend/images/{{ get_option('logo') }}" alt="{{ get_option('title') }}" width="163" height="39" />
                        </a>
                        <a href="{{ route('pages.home') }}" class="logo d-none d-lg-block">
                            <img src="/frontend/images/logo-footer.png" class="image" alt="{{ get_option('title') }}" style="height:40px; width:150px" />
                        </a>
                    </div>
                    <div class="header-center">
                        <a href="{{ route('pages.home') }}" class="logo d-lg-none">
                            <img src="/frontend/images/{{ get_option('image') }}" alt="logo" width="163" height="39" />
                        </a>
                        <!-- End of Logo -->
                        <div class="header-search hs-expanded">
                            <form action="{{ route('pages.home') }}" method="get" class="input-wrapper">
                                <div class="select-box">
                                    <select name="category">
                                        <option value="all">All Categories</option>
                                        <option @if(request('category') == 'course') selected
                                        @endif value="course">Course</option>
                                        <option @if(request('category') == 'event') selected
                                        @endif value="event">Events</option>
                                        <option @if(request('category') == 'notice') selected
                                        @endif value="notice">Notices</option>
                                        <option @if(request('category') == 'news') selected
                                        @endif value="news">News</option>
                                        <option @if(request('category') == 'jobs') selected
                                        @endif value="jobs">Jobs</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" name="term" value="{{ request('term') }}" id="search" placeholder="Search your keyword..." required="">
                                <button class="btn btn-sm btn-search" type="submit"><i class="d-icon-search"></i></button>
                            </form>
                        </div>
                        <!-- End of Header Search -->

                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="{{ Nav::isRoute('pages.home') }}">
                                    <a href="{{ route('pages.home') }}">Home</a>
                                </li>
                                <li
                                    class="d-xl-show {{ Nav::isRoute('pages.placement') }} {{ Nav::isRoute('team_member.show') }} {{ Nav::isRoute('pages.facility') }} {{ Nav::isRoute('pages.team') }} {{ Nav::isRoute('pages.objective') }} {{ Nav::isRoute('pages.director') }} {{ Nav::isRoute('pages.introduction') }}">
                                    <a href="#">About Us</a>
                                    <ul>
                                        <li class="{{ Nav::isRoute('pages.introduction') }}"><a href="{{ route('pages.introduction') }}">Introduction</a></li>
                                        <li class="{{ Nav::isRoute('pages.director') }}"><a href="{{ route('pages.director') }}">Message from director</a></li>
                                        <li class="{{ Nav::isRoute('pages.objective') }}"><a href="{{ route('pages.objective') }}">Our Objective, Mission & Vision</a></li>
                                        <li class="{{ Nav::isRoute('pages.team') }} {{ Nav::isRoute('team_member.show') }}"><a href="{{ route('pages.team') }}">Team Members</a></li>
                                        <li class="{{ Nav::isRoute('pages.facility') }}"><a href="{{ route('pages.facility') }}">Facility & Resources</a></li>
                                        <li class="{{ Nav::isRoute('pages.placement') }}"><a href="{{ route('pages.placement') }}">Placement & Support Unit</a></li>
                                    </ul>
                                </li>
                                <!-- End of Dropdown -->
                                <li class="{{ Nav::isRoute('pages.course') }} {{ Nav::isRoute('course.register') }} {{ Nav::isRoute('course.show') }}">
                                    <a href="{{ route('pages.course') }}">Courses</a>
                                    <ul>
                                        @foreach (get_courses() as $data)
                                        <li><a href="{{ route('course.show', $data->slug) }}">{{ $data->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="{{ Nav::isRoute('pages.event') }} || {{ Nav::isRoute('event.show') }} || {{ Nav::isRoute('event.register') }}">
                                    <a href="{{ route('pages.event') }}">Events</a>
                                </li>
                                <li class="{{ Nav::isRoute('pages.notice') }} || {{ Nav::isRoute('notice.show') }}">
                                    <a href="{{ route('pages.notice') }}">Notices</a>
                                </li>
                                <li class="{{ Nav::isRoute('pages.gallery') }}">
                                    <a href="{{ route('pages.gallery') }}">Gallery</a>
                                </li>
                                <li class="{{ Nav::isRoute('pages.news') }} || {{ Nav::isRoute('blog.show') }} || {{ Nav::isRoute('category.show') }} || {{ Nav::isRoute('tag.show') }} || {{ Nav::isRoute('comment.index') }}">
                                    <a href="{{ route('pages.news') }}">News</a>
                                </li>
                                <!-- End of Dropdown -->
                                <li class="d-xl-show {{ Nav::isRoute('pages.contact') }}">
                                    <a href="{{ route('pages.contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        @guest
                        <a class="login ajaxload-popup" href="{{ route('login') }}">
                            <i class="fa fa-sign-in-alt"></i>
                            <span>Login</span>
                        </a>
                        <!-- End of Login -->
                        <span class="dividernone"></span>
                        <a class="login ajaxload-popup" href="{{ route('register') }}">
                            <i class="fa fa-user-plus"></i>
                            <span>Register</span>
                        </a>
                        @else
                        <a style="font-size:18px" class="d-lg-show" href="{{ route('dashboard') }}">
                            <i class="fa fa-user-alt"></i>
                            <span>{{ Auth::user()->user_name }}</span>
                        </a>
                        @endguest

                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search your keyword..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                </div>
            </div>
            <div class="header-bottom d-lg-show">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <nav class="main-nav">
                                <ul class="menu">
                                    <li class="{{ Nav::isRoute('pages.home') }}">
                                        <a href="{{ route('pages.home') }}">Home</a>
                                    </li>
                                    <li
                                        class="{{ Nav::isRoute('pages.placement') }} {{ Nav::isRoute('team_member.show') }} {{ Nav::isRoute('pages.facility') }} {{ Nav::isRoute('pages.team') }} {{ Nav::isRoute('pages.objective') }} {{ Nav::isRoute('pages.director') }} {{ Nav::isRoute('pages.introduction') }}">
                                        <a href="#">About Us</a>
                                        <ul>
                                            <li class="{{ Nav::isRoute('pages.introduction') }}"><a href="{{ route('pages.introduction') }}">Introduction</a></li>
                                            <li class="{{ Nav::isRoute('pages.director') }}"><a href="{{ route('pages.director') }}">Message from director</a></li>
                                            <li class="{{ Nav::isRoute('pages.objective') }}"><a href="{{ route('pages.objective') }}">Our Objective, Mission & Vision</a></li>
                                            <li class="{{ Nav::isRoute('pages.team') }} {{ Nav::isRoute('team_member.show') }}"><a href="{{ route('pages.team') }}">Team Members</a></li>
                                            <li class="{{ Nav::isRoute('pages.facility') }}"><a href="{{ route('pages.facility') }}">Facility & Resources</a></li>
                                            <li class="{{ Nav::isRoute('pages.placement') }}"><a href="{{ route('pages.placement') }}">Placement & Support Unit</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ Nav::isRoute('pages.course') }} {{ Nav::isRoute('course.register') }} {{ Nav::isRoute('course.show') }}">
                                        <a href="{{ route('pages.course') }}">Courses</a>
                                        <ul>
                                            @foreach (get_courses() as $data)
                                            <li><a href="{{ route('course.show', $data->slug) }}">{{ $data->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="{{ Nav::isRoute('pages.event') }} || {{ Nav::isRoute('event.register') }} || {{ Nav::isRoute('event.show') }}">
                                        <a href="{{ route('pages.event') }}">Events</a>
                                    </li>
                                    <li class="{{ Nav::isRoute('pages.notice') }} || {{ Nav::isRoute('notice.show') }}">
                                        <a href="{{ route('pages.notice') }}">Notices</a>
                                    </li>
                                    <li class="{{ Nav::isRoute('pages.gallery') }}">
                                        <a href="{{ route('pages.gallery') }}">Gallery</a>
                                    </li>
                                    <li class="{{ Nav::isRoute('pages.news') }} || {{ Nav::isRoute('blog.show') }} || {{ Nav::isRoute('category.show') }} || {{ Nav::isRoute('tag.show') }} || {{ Nav::isRoute('comment.index') }}">
                                        <a href="{{ route('pages.news') }}">News</a>
                                    </li>
                                    <!-- End of Dropdown -->
                                    <li class="{{ Nav::isRoute('pages.contact') }}">
                                        <a href="{{ route('pages.contact') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <nav class="custom-menu">
                                <ul class="menu">
                                    <li>
                                        <a href="{{ route('form.appointment') }}" class="ajaxload-popup">Get a Quote</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Start main-content -->
        @yield('content')

        <!-- Footer -->
        <footer id="footer" class="footer divider layer-overlay overlay-dark-8">
            <div class="container pt-50 pb-15">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <img class="mt-5 mb-20" style="width:200px;height:80px;" alt="{{ get_option('title') }}" src="/frontend/images/{{ get_option('logo') }}">
                            <p>{{ get_option('address') }}</p>
                            <ul class="list-inline mt-5">
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="tel:{{get_option('official_phone')}}">{{ get_option('official_phone') }}</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope text-theme-colored2 mr-5"></i> <a class="text-gray" href="mailto:{{ get_option('official_email') }}">{{ get_option('official_email') }}</a> </li>
                            </ul>
                            <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
                                <li><a href="{{ get_option('facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ get_option('twitter') }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ get_option('instagram') }}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h4 class="widget-title line-bottom-theme-colored-2">Useful Links</h4>
                            <ul class="angle-double-right list-border">
                                <li><a href="{{ route('pages.home') }}">Home</a></li>
                                <li><a href="{{ route('pages.introduction') }}">About Us</a></li>
                                <li><a href="{{ route('pages.course') }}">Courses</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h4 class="widget-title line-bottom-theme-colored-2">Top News</h4>
                            <div class="latest-posts">
                                @foreach (get_recent_news() as $data)
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a class="post-thumb" href="{{ route('blog.show', $data->slug) }}"><img width="80" height="55" src="/frontend/images/{{ $data->feature_image }}" alt="{{ $data->title }}"></a>
                                    <div class="post-right">
                                        <h4 class="post-title mt-0 mb-5"><a href="{{ route('blog.show', $data->slug) }}">{{ Str::limit($data->title, 32) }}</a></h4>
                                        <p class="post-date mb-0 font-12">{{ $data->date }}</p>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h4 class="widget-title line-bottom-theme-colored-2">Opening Hours</h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix"> <span> Sun - Fri : </span>
                                        <div class="value pull-right"> {{ get_option('starting_time') }} - {{ get_option('ending_time') }} </div>
                                    </li>
                                    <li class="clearfix"> <span> Sat : </span>
                                        <div class="value pull-right bg-theme-colored2 text-white closed"> Closed </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom" data-bg-color="#2b2d3b">
                <div class="container pt-0 pb-0">
                    <div class="row" style="width:100%">
                        <div class="col-md-6">
                            <p class="font-12 text-black-777 m-0 sm-text-center">{!! get_option('copyright') !!}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="widget no-border m-0">
                                <ul class="list-inline sm-text-center mt-5 font-12">
                                    <li>
                                        <a href="{{ route('pages.faq') }}">FAQ</a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a href="{{ route('pages.event') }}">Events</a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a href="{{ route('pages.notice') }}">Notices</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Scroll Top -->
        <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
        <!-- MobileMenu -->
        <div class="mobile-menu-wrapper">
            <div class="mobile-menu-overlay">
            </div>
            <!-- End of Overlay -->
            <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
            <!-- End of CloseButton -->
            <div class="mobile-menu-container scrollable">
                <form action="#" class="input-wrapper">
                    <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search your keyword..." required />
                    <button class="btn btn-search" type="submit">
                        <i class="d-icon-search"></i>
                    </button>
                </form>
                <!-- End of Search Form -->
                <ul class="mobile-menu mmenu-anim">
                    <li class="{{ Nav::isRoute('pages.home') }}">
                        <a href="{{ route('pages.home') }}">Home</a>
                    </li>
                    <li
                        class="{{ Nav::isRoute('pages.team') }} {{ Nav::isRoute('pages.placement') }} {{ Nav::isRoute('pages.facility') }} {{ Nav::isRoute('pages.introduction') }} {{ Nav::isRoute('pages.director') }} {{ Nav::isRoute('pages.objective') }}">
                        <a href="#">About Us</a>
                        <ul>
                            <li class="{{ Nav::isRoute('pages.introduction') }}"><a href="{{ route('pages.introduction') }}">Introduction</a></li>
                            <li class="{{ Nav::isRoute('pages.director') }}"><a href="{{ route('pages.director') }}">Message from director</a></li>
                            <li class="{{ Nav::isRoute('pages.objective') }}"><a href="{{ route('pages.objective') }}">Our Objective, Mission & Vision</a></li>
                            <li class="{{ Nav::isRoute('pages.team') }}"><a href="{{ route('pages.team') }}">Team Members</a></li>
                            <li class="{{ Nav::isRoute('pages.facility') }}"><a href="{{ route('pages.facility') }}">Facility & Resources</a></li>
                            <li class="{{ Nav::isRoute('pages.placement') }}"><a href="{{ route('pages.placement') }}">Placement & Support Unit</a></li>
                        </ul>
                    </li>
                    <li class="{{ Nav::isRoute('pages.course') }} {{ Nav::isRoute('course.comment') }} {{ Nav::isRoute('course.show') }}">
                        <a href="{{ route('pages.course') }}">Courses</a>
                        <ul>
                            @foreach (get_courses() as $data)
                            <li class="{{ Nav::isRoute('course.show', $data->slug) }}"><a href="{{ route('course.show', $data->slug) }}">{{ $data->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ Nav::isRoute('pages.event') }} {{ Nav::isRoute('event.show') }} {{ Nav::isRoute('event.register') }}">
                        <a href="{{ route('pages.event') }}">Events</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.notice') }} {{ Nav::isRoute('notice.show') }}">
                        <a href="{{ route('pages.notice') }}">Notices</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.gallery') }}">
                        <a href="{{ route('pages.gallery') }}">Gallery</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.news') }} {{ Nav::isRoute('blog.show') }} {{ Nav::isRoute('category.show') }} {{ Nav::isRoute('tag.show') }} {{ Nav::isRoute('comment.index') }}">
                        <a href="{{ route('pages.news') }}">News</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.admission') }}">
                        <a href="{{ route('pages.admission') }}">Admission</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.job') }} {{ Nav::isRoute('job.show') }}">
                        <a href="{{ route('pages.admission') }}">Jobs</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.faq') }}">
                        <a href="{{ route('pages.faq') }}">FAQs</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.download') }}">
                        <a href="{{ route('pages.download') }}">Download</a>
                    </li>
                    <li class="{{ Nav::isRoute('pages.contact') }}">
                        <a href="{{ route('pages.contact') }}">Contact Us</a>
                    </li>
                    @auth
                    <li class="{{ Nav::isRoute('logout') }}">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="{{ Nav::isRoute('register') }}"><a href="{{ route('register') }}">Register</a></li>
                    <li class="{{ Nav::isRoute('login') }}"><a href="{{ route('login') }}">Log In</a></li>
                    @endguest
                </ul>
                <!-- End of MobileMenu -->
            </div>
        </div>
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="/frontend/js/custom.js"></script>
    <script src="/frontend/js/main.js" charset="utf-8"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="/frontend/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
    <!--  Notifications Plugin    -->
    <script type="text/javascript" src="{{ asset('backend') }}/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/js/toastr.js"></script>
    @include('layouts.frontend.script')

</body>

</html>