<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kualitas Tanah</title>
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
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</a></li>
                        <li><a href="{{ route('login.admin.view') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk Admin</a></li>
                        <li><a href="{{ route('register.view') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Daftar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="content">
        @if (session()->has('danger'))
            <div class="alert alert-danger">
                <strong>Error!</strong>
                {{ session()->get('danger') }}
            </div>
        @endif
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong>
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-box">
                        <h3 class="signin-title-secondary">Halaman Login Ini Hanya Untuk Admin</h3>
                        {!! Form::open(['id' => 'form','route' => 'login.admin.process']) !!}
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Masukan email anda">
                            </div>
                            <div class="form-group mg-b-50">
                                <input name="password" type="password" class="form-control" placeholder="Masukan Password Anda">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-signin">Masuk</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>