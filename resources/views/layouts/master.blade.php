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
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <link rel="shortcut icon" href="{{asset('assets/images/easyprivat-icon.png')}}" type="image/x-icon">
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.min.css')}}">
    <link href="{{asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('vendor/switchery/switchery.min.css')}}" rel="stylesheet" media="screen">
    <!-- end: MAIN CSS -->
    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themes/theme-4.css')}}" id="skin_color" />
    <!-- end: CLIP-TWO CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

    <!-- start: Another Page CSS -->
    @yield('css')
    <!-- end Another Page CSS -->
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
                        <li class="active open">
                            <a href="{{url('admin/dashboard')}}">
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
                        <li>
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
                                <li>
                                    <a href="{{url('users/data-murid')}}">
                                        <span class="title"> Murid </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('users/data-guru')}}">
                                        <span class="title"> Guru </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ? End of Users -->
                        <!-- ? Kriteia dan Bobot -->
                        <li>
                            <a href="{{url('/kriteria-bobot')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-settings"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Kriteia dan Bobot </span>
                                    </div>
                                </div>
                            </a>
                            <!-- <ul class="sub-menu">
                                <li>
                                    <a href="{{url('kriteria')}}">
                                        <span class="title"> Kriteria </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('bobot')}}">
                                        <span class="title"> Bobot </span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <!-- ? End of Kriteria dan Bobot -->
                        <!-- ? Nilai Gap -->
                        <li>
                            <a href="{{url('nilai-gap')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-settings"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Nilai GAP </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Nilai Gap -->
                        <!-- ? Pembobotan Nilai Gap -->
                        <li>
                            <a href="{{url('pembobotan-nilai-gap')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-settings"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Pembobotan Nilai GAP </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pembobotan Nilai Gap -->
                        <!-- ? Hasil Seleksi -->
                        <li>
                            <a href="{{url('hasil-seleksi')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-settings"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Hasil Seleksi </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Hasil Seleksi -->
                        <!-- ? Microteaching -->
                        <li>
                            <a href="{{url('video-microteaching')}}">
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
                        <li>
                            <a href="{{url('pemesanan')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-settings"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Pemesanan </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pemesanan -->
                        <!-- ? Absensi -->
                        <li>
                            <a href="{{url('absensi')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-settings"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Absensi </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Absensi -->
                        <!-- ? Pemasukan -->
                        <li>
                            <a href="{{url('pemasukan')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-money"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Pemasukan </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pemasukan -->
                        <!-- ? Pengeluaran -->
                        <li>
                            <a href="{{url('pengeluaran')}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-settings"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Pengeluaran </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- ? End of Pengeluaran -->
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
                                <img src="{{asset('assets/images/avatar-1.jpg')}}" alt="Admin"> <span class="username">Admin <i class="ti-angle-down"></i></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-dark">
                                <li>
                                    <a href="pages_user_profile.html">
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="login_signin.html">
                                        Log Out
                                    </a>
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
                                    <span>@yield('pages')</span>
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
                    &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> ClipTheme</span>.
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
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{asset('vendor/jquery-cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('vendor/switchery/switchery.min.js')}}"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- <script src="{{asset('vendor/Chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.sparkline/jquery.sparkline.min.js')}}"></script> -->
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
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
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>