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
      <div class="signin-box">
        <h2 class="slim-logo"><a href="index.html">slim<span>.</span></a></h2>
        <h2 class="signin-title-primary">Selamat Datang!</h2>
        <h3 class="signin-title-secondary">Silakan masuk untuk melanjutkan.</h3>

        <div class="form-group">
          <input name="email" type="text" class="form-control" placeholder="Masukan email anda">
        </div>
        <div class="form-group mg-b-50">
          <input name="password" type="password" class="form-control" placeholder="Masukan Password Anda">
        </div>
        <button class="btn btn-primary btn-block btn-signin">Masuk</button>
        <p class="mg-b-0">Belum punya akun? <a href="{{ route('register.view') }}">Daftar disini</a></p>
      </div>
    </div>

    <script src="{{ asset('theme/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.js') }}"></script>

    <script src="{{ asset('theme/js/slim.js') }}"></script>

  </body>
</html>
