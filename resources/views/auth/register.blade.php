
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kualitas Tanah</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="header">
        <div class="website-name">
            <h3>Sistem Pakar Penilaian Kualitas Tanah</h3>
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
                        <li><a href="{{ route('login.view') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</a></li>
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
                        <h3 class="signin-title-secondary">Silakan daftar untuk melanjutkan.</h3>
                        {!! Form::open(['id' => 'form','route' => 'register']) !!}
                            <div class="row row-xs mg-b-10">
                                <div class="col-md-12">
                                    <input name="name" type="text" class="form-control" placeholder="Masukan nama lengkap anda">
                                </div>
                                <div class="col-md-12 mg-t-10 mg-sm-t-0">
                                    <input name="username" type="text" class="form-control" placeholder="Masukan nama pengguna anda">
                                </div>
                            </div><!-- row -->
            
                            <div class="row row-xs mg-b-10">
                                <div class="col-md-12">
                                    <input name="email" type="email" class="form-control" placeholder="Masukan email anda">
                                </div>
                                <div class="col-md-12 mg-t-10 mg-sm-t-0">
                                    <input name="password" type="password" class="form-control" placeholder="Masukan password anda">
                                </div>
                            </div>
            
                            <div class="row row-xs mg-b-10">
                                <div class="col-md-12">
                                    {!! Form::select('gender', ['L' => 'Laki Laki', 'P' => 'Perempuan'], null, 
                                        ['placeholder' => 'Pilih Jenis Kelamin','class' => 'form-control']) !!}
                                </div>
                            </div>
                    
                            <div class="row row-xs mg-b-10">
                                <div class="col-md-12">
                                    <textarea name="address" placeholder="Masukan alamat anda" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-signin">Daftar</button>
                        {!! Form::close() !!}
                        <p class="mg-t-40 mg-b-0">Sudah punya akun? <a href="{{ route('login.view') }}">Masuk disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
