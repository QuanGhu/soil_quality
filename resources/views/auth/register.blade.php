<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Kualitas Tanah</title>

    <link href="{{ asset('theme/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/ionicons.css' )}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/css/slim.css') }}">

  </head>
  <body>

    <div class="signin-wrapper">
        <div class="signin-box signup">
            <h2 class="slim-logo"><a href="index.html">slim<span>.</span></a></h2>
            <h3 class="signin-title-primary">Selamat Datang!</h3>
            <h5 class="signin-title-secondary lh-4">Silakan mendaftar untuk melanjutkan</h5>

            <div class="row row-xs mg-b-10">
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="Masukan nama lengkap anda">
                </div>
                <div class="col-sm mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" placeholder="Masukan nama pengguna anda">
                </div>
            </div><!-- row -->

            <div class="row row-xs mg-b-10">
                <div class="col-sm">
                    <input type="email" class="form-control" placeholder="Masukan email anda">
                </div>
                <div class="col-sm mg-t-10 mg-sm-t-0">
                    <input type="password" class="form-control" placeholder="Masukan password anda">
                </div>
            </div>

            <div class="row row-xs mg-b-10">
                <div class="col-sm">
                    {!! Form::select('gender', ['L' => 'Laki Laki', 'P' => 'Perempuan'], null, 
                        ['placeholder' => 'Pilih Jenis Kelamin','class' => 'form-control']) !!}
                </div>
            </div>
    

            <div class="row row-xs mg-b-10">
                <div class="col-sm">
                    <textarea name="address" placeholder="Masukan alamat anda" class="form-control"></textarea>
                </div>
            </div>

            <button class="btn btn-primary btn-block btn-signin">Sign Up</button>
            <p class="mg-t-40 mg-b-0">Sudah punya akun? <a href="{{ route('login.view') }}">Masuk disini</a></p>
        </div>
    </div>

    <script src="{{ asset('theme/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.js') }}"></script>

    <script src="{{ asset('theme/js/slim.js') }}"></script>

  </body>
</html>
