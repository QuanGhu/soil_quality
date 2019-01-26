<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Kualitas Tanah</title>

    <link href="{{ asset('theme/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/ionicons.css' )}}" rel="stylesheet">
    <link href="{{ asset('theme/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/dataTables.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/css/slim.css') }}">
    @yield('css')
  </head>
  <body>
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="index.html">slim<span>.</span></a></h2>
        </div>
        <div class="slim-header-right">
          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
              <img src="http://via.placeholder.com/500x500" alt="">
              <span>Katherine</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
                <a href="page-profile.html" class="nav-link"><i class="icon ion-person"></i> View Profile</a>
                <a href="page-edit-profile.html" class="nav-link"><i class="icon ion-compose"></i> Edit Profile</a>
                <a href="page-activity.html" class="nav-link"><i class="icon ion-ios-bolt"></i> Activity Log</a>
                <a href="page-settings.html" class="nav-link"><i class="icon ion-ios-gear"></i> Account Settings</a>
                <a href="page-signin.html" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slim-navbar">
      <div class="container">
        @include('layouts.navbar')
      </div><!-- container -->
    </div><!-- slim-navbar -->

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          @yield('breadcrumbs')
          <h6 class="slim-pagetitle">@yield('page_title')</h6>
        </div>
        @yield('content')
      </div>
    </div>

    <div class="slim-footer">
      <div class="container">
        <p>Copyright 2018 &copy; All Rights Reserved. Slim Dashboard Template</p>
        <p>Designed by: <a href="">ThemePixels</a></p>
      </div>
    </div>

    <script src="{{ asset('theme/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.js') }}"></script>
    <script src="{{ asset('theme/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('theme/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.sweet-alert.custom.js') }}"></script>
    <script src="{{ asset('theme/js/slim.js') }}"></script>
    @stack('scripts')
  </body>
</html>
