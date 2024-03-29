<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->

<head>
    <title>@yield('title')</title>
    <!-- start: META -->
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="Easy Private adalah Aplikasi Pencarian Guru Privat" name="description" />
    <meta content="Easy Private" name="author" />
    <link rel="shortcut icon" href="{{asset('assets/images/easyprivat-icon.png')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- end: META -->
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    <link href="{{url('/vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{url('/')}}/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="{{url('/')}}/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="{{url('/')}}/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.min.css')}}">
    <link href=" {{asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet" media="screen">
    <link href=" {{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.css')}}" rel="stylesheet" media="screen">
    <link href=" {{asset('vendor/switchery/switchery.min.css')}}" rel="stylesheet" media="screen">
    <!-- end: MAIN CSS -->
    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themes/theme-4.css')}}" id="skin_color" />
    <link rel="stylesheet" href="{{asset('assets/css/themes/theme-4.css')}}" id="skin_color" />
    <!-- end: CLIP-TWO CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    @yield('css')
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<!-- end: HEAD -->

<body>
    <div id="app">
        <!-- sidebar -->
        <div class="sidebar app-aside" id="sidebar">
            <div class="sidebar-container perfect-scrollbar">
                <nav>
                    <!-- start: MAIN NAVIGATION MENU -->
                    <div class="navbar-title">
                        <span>Main Navigation</span>
                    </div>
                    <ul class="main-navigation-menu">
                        <li class="{{(Request::is('/', 'home')) ? 'active open' : ''}}">
                            <a href="{{url('home')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-home"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Dashboard </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? Pendaftaran Guru Profile -->
                        <li class="{{(Request::is('/', 'user-profile/create')) ? 'active open' : ''}}">
                            <a href="{{url('/user-profile/create')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-user"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Form Pendaftaran Profile Guru </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pendaftaran Guru Profile -->
                        <!-- ? Pendaftaran Guru -->
                        <li class="{{(Request::is('/', 'user/create')) ? 'active open' : ''}}">
                            <a href="{{url('/user/create')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-notepad"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Form Pendaftaran Guru </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pendaftaran Guru -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- / sidebar -->
        <div class="app-content">
            <!-- start: TOP NAVBAR -->
            <header class="navbar navbar-default navbar-static-top">
                <!-- start: NAVBAR HEADER -->
                <div class="navbar-header">
                    <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                        <i class="ti-align-justify"></i>
                    </a>
                    <a class="navbar-brand" href="index.html">
                        <!-- <img src="assets/images/logo.png" alt="Easy Private" /> -->
                        Easy Private
                    </a>
                    <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                        <i class="ti-align-justify"></i>
                    </a>
                    <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="ti-view-grid"></i>
                    </a>
                </div>
                <!-- end: NAVBAR HEADER -->
                <!-- start: NAVBAR COLLAPSE -->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-right">
                        <!-- start: LANGUAGE SWITCHER -->
                        <!-- start: USER OPTIONS DROPDOWN -->
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="dropdown current-user">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                @if(isset(auth()->user()->avatar))
                                <?php
                                $avatar = substr(auth()->user()->avatar, 0, 4);
                                if ($avatar == "http") {
                                    ?>
                                    <img src="{{ auth()->user()->avatar }}" alt="avatar" style="height: 39px; object-fit:cover;">
                                <?php } else { ?>
                                    <img src="{{URL::asset('/assets/avatars/default.jpg')}}" alt="avatar" style="height: 39px; object-fit:cover;">
                                <?php } ?>
                                @endif
                                <span class="username">{{ auth()->user()->name }}<i class="ti-angle-down"></i></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-dark">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @endguest
                            </ul>
                        </li>
                        <!-- end: USER OPTIONS DROPDOWN -->
                    </ul>
                    <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                    <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                        <div class="arrow-left"></div>
                        <div class="arrow-right"></div>
                    </div>
                    <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
                </div>
                <!-- end: NAVBAR COLLAPSE -->
            </header>
            <!-- end: TOP NAVBAR -->
            <div class="main-content" style="position:relative; top:auto; width: auto;">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title" class="padding-top-15 padding-bottom-15">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">@yield('main-title')</h1>
                                <span class="mainDescription">@yield('description')</span>
                            </div>
                            <ol id="cl-effect-5" class="breadcrumb links cl-effect-5">
                                <li>
                                    <span data-hover="Home"><a href="{{url('home')}}">Dashboard</a></span>
                                </li>
                                <li class="active">
                                    <span>@yield('blank-page')</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: CONTENT -->
                    @yield('content')
                    <!-- end: CONTENT -->
                </div>
            </div>
        </div>
        <!-- start: FOOTER -->
        <footer>
            <div class="footer-inner">
                <div class="pull-left">
                    &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Easy Private</span>.
                    <span>All rights reserved</span>
                </div>
                <div class="pull-right">
                    <span class="go-top"><i class="ti-angle-up"></i></span>
                </div>
            </div>
        </footer>
        <!-- end: FOOTER -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="{{url('/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{asset('vendor/jquery-cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('vendor/switchery/switchery.min.js')}}"></script>
    <!-- end: MAIN JAVASCRIPTS -->

    <!-- start: JAVASCRIPTS REQUIRED FOR THIS Chart Only -->
    <script src="{{asset('vendor/Chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS Chart Only -->

    <!-- start: JAVASCRIPTS REQUIRED FOR DATEPICKER ONLY -->

    <!-- <script src=" {{asset('vendor/select2/select2.min.js')}}"></script>
    <script src=" {{asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src=" {{asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script> -->
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGES ONLY -->
    @yield('javascript')
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/form-elements.js')}}"></script>
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <!-- start: JavaScript Event Handlers for form elements page -->
    <!-- <script src="{{asset('assets/js/index.js')}}"></script> -->
    <!-- <script src="{{asset('assets/js/form-elements.js')}}"></script> -->
    <!-- awalnya yield javascript disini -->
    <script>
        jQuery(document).ready(function() {
            Main.init();
            // Index.init();
            FormElements.init();
            FormValidator.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for form elements page -->
    <!-- start: javascript for this page only -->

    <!-- end: javascript for this page only -->

</body>

</html>