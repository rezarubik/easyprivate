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
    <link rel="shortcut icon" href="{{asset('assets/images/easyprivat-icon.png')}}" type="image/x-icon">
    <!-- start: META -->
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{asset('assets/images/easyprivat-icon.png')}}" type="image/x-icon">
    <!-- end: META -->
    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <!-- end: META -->
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="{{url('/')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/vendor/themify-icons/themify-icons.min.css">
    <link href="{{url('/')}}/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="{{url('/')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="{{url('/')}}/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">

    <!-- end: MAIN CSS -->
    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/styles.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/plugins.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/themes/theme-4.css" id="skin_color" />
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
                    <!-- start: SEARCH FORM -->
                    <div class="search-form">
                        <a class="s-open" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <form class="navbar-form" role="search">
                            <a class="s-remove" href="#" target=".navbar-form">
                                <i class="ti-close"></i>
                            </a>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="btn search-button" type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end: SEARCH FORM -->
                    <!-- start: MAIN NAVIGATION MENU -->
                    <div class="navbar-title">
                        <span>Main Navigation</span>
                    </div>
                    <ul class="main-navigation-menu">
                        <li class="{{(Request::is('/', 'admin/dashboard')) ? 'active open' : ''}}">
                            <!-- class="active open" -->
                            <a href="{{route('admin.home')}}">
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
                        <!-- ? Users -->
                        <li class="{{(Request::is('admin/users/data-murid', 'admin/users/data-guru')) ? 'active open' : ''}}">
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-user"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Users </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li class="{{(Request::is('admin/users/data-murid')) ? 'active open' : ''}}">
                                    <a href="{{route('admin.users.murid')}}">
                                        <span class="title"> Murid </span>
                                    </a>
                                </li>
                                <li class="{{(Request::is('admin/users/data-guru')) ? 'active open' : ''}}">
                                    <a href="{{route('admin.users.guru')}}">
                                        <span class="title"> Guru </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ? End of Users -->
                        <!-- ? Kriteria dan Bobot -->
                        <li class="{{(Request::is('/', 'admin/kriteria-bobot')) ? 'active open' : ''}}">
                            <a href="{{route('kriteria.bobot')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-star"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Kriteria dan Bobot </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Kriteria dan Bobot -->
                        <!-- ? Nilai Gap -->
                        <li class="{{(Request::is('/', 'admin/nilai-gap')) ? 'active open' : ''}}">
                            <a href="{{route('nilai.gap')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-target"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Nilai GAP </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Nilai Gap -->
                        <!-- ? Pembobotan Nilai Gap -->
                        <li class="{{(Request::is('/', 'admin/pembobotan-nilai-gap')) ? 'active open' : ''}}">
                            <a href="{{route('pembobotan.nilai.gap')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-lock"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Pembobotan Nilai GAP </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pembobotan Nilai Gap -->
                        <!-- ? Hasil Seleksi -->
                        <li class="{{(Request::is('/', 'admin/hasil-seleksi')) ? 'active open' : ''}}">
                            <a href="{{route('hasil.seleksi')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-bookmark"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Hasil Seleksi </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Hasil Seleksi -->
                        <!-- ? Microteaching -->
                        <li class="{{(Request::is('/', 'admin/video-microteaching')) ? 'active open' : ''}}">
                            <a href="{{route('video.microteaching')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-video-camera"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Microteaching </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Microteaching -->
                        <!-- ? Pemesanan -->
                        <li class="{{(Request::is('/', 'admin/pemesanan')) ? 'active open' : ''}}">
                            <a href="{{route('pemesanan')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-shopping-cart"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Pemesanan </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pemesanan -->
                        <!-- ? Absensi -->
                        <li class="{{(Request::is('/', 'admin/absensi')) ? 'active open' : ''}}">
                            <a href="{{route('absensi')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-face-smile"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Absensi </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Absensi -->
                        <!-- ? Pemasukan dan Pengeluaran (Cashflow) -->
                        <li class="{{(Request::is('admin/cashflow')) ? 'active open' : ''}}">
                            <!-- 'admin/pemasukan', 'admin/pengeluaran' -->
                            <a href="{{route('cashflow')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-money"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Cashflow </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- <ul class="sub-menu">
                                <li class="{{(Request::is('admin/pemasukan')) ? 'active open' : ''}}">
                                    <a href="{{route('admin.pemasukan')}}">
                                        <span class="title"> Pemasukan </span>
                                    </a>
                                </li>
                                <li class="{{(Request::is('admin/pengeluaran')) ? 'active open' : ''}}">
                                    <a href="{{route('admin.pengeluaran')}}">
                                        <span class="title"> Pengeluaran </span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <!-- ? End of Pemasukan dan Pengeluaran (Cashflow) -->
                    </ul>
                    <!-- end: MAIN NAVIGATION MENU -->
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
                    <a class="navbar-brand" href="{{url('/admin/dashboard')}}">
                        <!-- <img src="{{asset('assets/images/easyprivate.png')}}" alt="Easy Private" /> -->
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
                        <li class="dropdown current-user">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('assets/images/avatar-1.jpg')}}" alt="Admin">
                                <span class="username">{{ auth()->user()->name }}<i class="ti-angle-down"></i></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-dark">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- end: USER OPTIONS DROPDOWN -->
                    </ul>
                </div>
                <!-- end: NAVBAR COLLAPSE -->
            </header>
            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: DASHBOARD TITLE -->
                    <section id="page-title">
                        <!-- class="padding-top-15 padding-bottom-15" -->
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">@yield('main-title')</h1>
                                <span class="mainDescription">@yield('description')</span>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span data-hover="Home"><a href="{{route('admin.home')}}">Dashboard</a></span>
                                </li>
                                <li class="active">
                                    <span>@yield('active-pages')</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: DASHBOARD TITLE -->
                    <!-- start: YOUR CONTENT HERE -->
                    @yield('content')
                    <!-- end: YOUR CONTENT HERE -->
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
    <!-- Awalnya disini -->

    <!-- start: MAIN JAVASCRIPTS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{asset('vendor/jquery-cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('vendor/switchery/switchery.min.js')}}"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR Graph ONLY -->
    <script src="{{asset('vendor/Chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR Graph ONLY -->
    <!-- start: Only for another pages -->
    @yield('javascript')
    <!-- end: Only for another pages -->

    <!-- start: JS For Another Page -->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('vendor/DataTables/jquery.dataTables.min.js')}}"></script>
    <!-- ennd: JS For Another Page -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <!-- <script src="{{asset('assets/js/index.js')}}"></script> -->
    <!-- start: JavaScript Event Handlers for additional page -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            // Index.init();
            TableData.init();
            FormValidator.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>