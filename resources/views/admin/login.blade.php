<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->
<!-- start: HEAD -->

<head>
  <title>Login Admin Easy Private</title>
  <!-- start: META -->
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- end: META -->
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
  <link rel="stylesheet" href="{{asset('assets/css/themes/theme-4.css')}}" id="skin_color" />
  <!-- end: CLIP-TWO CSS -->
  <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
  <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<!-- end: HEAD -->
<!-- start: BODY -->

<body class="login">
  <!-- start: LOGIN -->
  <div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="logo margin-top-30">
        <!-- <img src="assets/images/logo.png" alt="Clip-Two" /> -->
        <div class="card-header">{{ __('Login Admin') }}</div>
      </div>
      <!-- start: LOGIN BOX -->
      <div class="box-login">
        <form class="form-login" method="POST" action="{{ route('admin.login.submit') }}">
          @csrf
          <fieldset>
            <legend>
              Sign in to your account
            </legend>
            <p>
              Please enter your name and password to log in.
            </p>
            <div class="form-group">
              <span class="input-icon">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
                <i class="fa fa-user"></i> </span>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group form-actions">
              <span class="input-icon">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <i class="fa fa-lock"></i>
                <a class="forgot" href="login_forgot.html">
                  I forgot my password
                </a> </span>
            </div>
            <div class="form-actions">
              <div class="checkbox clip-check check-primary">
                <input type="checkbox" id="remember" value="1">
                <label for="remember">
                  Keep me signed in
                </label>
              </div>
              <button type="submit" class="btn btn-primary pull-right">
                Login <i class="fa fa-arrow-circle-right"></i>
              </button>
            </div>
            <div class="new-account">
              Don't have an account yet?
              <a href="login_registration.html">
                Create an account
              </a>
            </div>
          </fieldset>
        </form>
        <!-- start: COPYRIGHT -->
        <div class="copyright">
          &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Easy Private</span>. <span>All rights reserved</span>
        </div>
        <!-- end: COPYRIGHT -->
      </div>
      <!-- end: LOGIN BOX -->
    </div>
  </div>
  <!-- end: LOGIN -->
  <!-- start: MAIN JAVASCRIPTS -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>
  <script src="{{asset('vendor/jquery-cookie/jquery.cookie.js')}}"></script>
  <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('vendor/switchery/switchery.min.js')}}"></script>
  <!-- end: MAIN JAVASCRIPTS -->
  <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
  <script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
  <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
  <!-- start: CLIP-TWO JAVASCRIPTS -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <!-- start: JavaScript Event Handlers for this page -->
  <script src="{{asset('assets/js/login.js')}}"></script>
  <script>
    jQuery(document).ready(function() {
      Main.init();
      Login.init();
    });
  </script>
  <!-- end: JavaScript Event Handlers for this page -->
  <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
<!-- end: BODY -->

</html>