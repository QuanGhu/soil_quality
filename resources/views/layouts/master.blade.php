<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('theme/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .website-name {
            height: 200px;
            text-align: center;
            padding: 25px;
            background-image: url('assets/img/soil_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            background-position: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="website-name">
            <h3>Sistem Pakar Mendiagnosa Kesuburan Tanah</h3>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    @include('layouts.navbar')
                    
                </div>
            </div>
        </nav>
    </div>
    <div class="content">
      @yield('content')
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('theme/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('theme/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.sweet-alert.custom.js') }}"></script>
    @stack('scripts')
</body>
</html>