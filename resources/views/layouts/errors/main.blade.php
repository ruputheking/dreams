<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Learnpro - Education University School Kindergarten Learning HTML Template" />
    <meta name="keywords" content="education,school,university,educational,learn,learning,teaching,workshop" />
    <meta name="author" content="ThemeMascot" />

    <!-- Page Title -->
    <title>@yield('title')</title>

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
    <link rel="stylesheet" href="/frontend/css/demo3.min.css">
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
</head>

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <img alt="" src="images/preloaders/5.gif">
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>

        <!-- Start main-content -->
        <div class="main-content">
            <!-- Section: home -->
            <section id="home" class="fullscreen bg-lightest">
                <div class="display-table text-center">
                    <div class="display-table-cell">
                        <div class="container pt-0 pb-0">
                            <div class="row">
                                @yield('content')
                                <div class="col-md-4">
                                    <h3>Some Useful Links</h3>
                                    <div class="widget">
                                        <ul class="list-border">
                                            <li><a href="{{ route('pages.home') }}">Home</a></li>
                                            <li><a href="{{ route('pages.introduction') }}">About us</a></li>
                                            <li><a href="{{ route('pages.course') }}">Courses</a></li>
                                            <li><a href="{{ route('pages.faq') }}">Faq's</a></li>
                                            <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- end main-content -->

        <!-- Footer -->
        <footer id="footer" class="footer bg-black-111">
            <div class="container p-20">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="mb-0">{!! get_option('copyright') !!}</p>
                    </div>
                </div>
            </div>
        </footer>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="/frontend/js/custom.js"></script>

</body>

</html>