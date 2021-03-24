<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Peminjaman Ruangan Login</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css')}}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/_all.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition"  background="{{ url('/images/unand.png')}}" style="background-repeat:no-repeat; background-position: center top; background-attachment:fixed;">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>SISPEM Ruangan </b>Login</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Masuk untuk memulai sesi</p>

        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('nip_nim') ? ' has-error' : '' }}">
                <input type="nip_nim" class="form-control" name="nip_nim" value="{{ old('nip_nim') }}" placeholder="NIP/NIM">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('nip_nim'))
                    <span class="help-block">
                    <strong>{{ $errors->first('nip_nim') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"/> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                  <a href="#panduan" data-toggle="modal">Panduan?</a>
                </div>
            </div>
        </form>

        {{-- <a href="{{ url('/password/reset') }}">I forgot my password</a><br> --}}

    </div>
    <!-- /.login-box-body -->
</div>

<div class="modal fade" id="panduan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Panduan Peminjaman</h4>
      </div>
      <div class="modal-body">
        <ol style="font-size: 16px">
          <li>Peminjam mencari ruangan yang akan dipinjam berdasarkan tanggal (jika sudah dipinjam pada tanggal tersebut bisa melihat siapa yang meminjam)
          <ul>
            <li>Jika melihat ketersediaan ruangan pada speifik tanggal tertentu, hanya isi tanggal rentang awal saja</li>
            <li>Jika melihat ketersediaan ruangan pada rentang tanggal tertentu, isi tanggal rentang awal dan akhir</li>
          </ul>
          </li>
          <li>Peminjam hanya bisa meminjam ruangan setidaknya 3 hari sebelum tanggal pemakaian ruangan dimulai</li>
          <li>Silahkan tunggu konfirmasi dari WR II, KBSD, dan KSBU</li>
          <li>Jika WR II, KBSD, dan KSBU sudah menyetujui peminjaman, maka bisa mencetak surat peminjaman</li>
          <li>Bawa <i>print out</i> surat peminjaman ke KSBU untuk ditandatangani</li>
          <li>Setelah selesai pemakaian ruangan, WAJIB mengkonfirmasi selesai pemakaian, dengan menekan tombol selesai. Kritik dan saran harap di isi.</li>
          <li style="color: red">Jika tidak mengkonfirmasi selesai pemakaian ruangan setelah jatuh tempo tanggal selesai yang disimpan dalam sistem, maka sistem otomatis blokir akun peminjam</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- /.login-box -->

<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js')}}"></script>

<script src="{{ asset('js/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
