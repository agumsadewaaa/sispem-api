<!DOCTYPE html>
<html>
<head>
  @php
    $user = Auth::user();
  @endphp
    <meta charset="UTF-8">
    <title>Peminjaman Ruangan</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/_all.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/dataTables.bootstrap.css') !!}">
      <link rel="stylesheet" type="text/css" href="{!! asset('css/jquery-progressbar.css') !!}">


    @yield('css')

    <script src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! asset('js/selectize.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/custom.js') !!}"></script>
    <script src="{!! asset('js/jquery-progressbar.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/plugins/jquery.dataTables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/plugins/dataTables.bootstrap.min.js') !!}"></script>
</head>

<body class="skin-green sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
               <span class="logo-mini"><b>SP</b>R</span>
                <span class="logo-lg"><b>SISPEM</b> Ruangan</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                      @php
                        $role = $user->role->role;
                      @endphp
                      @if ($role != 'admin' && $role != 'user')
                        @php
                        $transaksis = \App\Models\Transaksi::all();
                        if (\Auth::user()->isWr()) {
                            $transaksis = $transaksis->filter(function ($value, $key) {
                                return $value->ruangan->need_wr_conf == 1;
                            });
                        } elseif (\Auth::user()->isKbsd()) {
                            $transaksis = $transaksis->filter(function ($value, $key) {
                                return $value->ruangan->need_wr_conf == 0;
                            });
                        }
                        $kolom = \Auth::user()->isWr() ? "konfirmasi_wr_id" :
                                  (\Auth::user()->isKbsd() ? "konfirmasi_kbsd_id" :
                                    (\Auth::user()->isKbu() ? "konfirmasi_kbu_id" : "konfirmasi_ksbrt_id"));
                        $notif = $transaksis->filter(function($t) use($kolom){
                          return $t->status == 0 && !$t->$kolom;
                        })->count();
                        @endphp
                        <li class="dropdown notifications-menu">
                          <a href="{{ route('listSemua')}}">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">{{ $notif }}</span>
                          </a>
                        </li>
                      @endif
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <i class="fa fa-user"></i>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{asset('/images/avatar.png')}}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Akun terdaftar sejak {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <button class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal">Profile</button>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © {{ date('Y') }} <a href="#">SISPEM Ruangan</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    SISPEM Ruangan
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profil Anda</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td>Nama</td>
              <td>{{$user->name}}</td>
            </tr>
            <tr>
              <td>NIP/NIM</td>
              <td>{{$user->nip_nim}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{$user->email}}</td>
            </tr>
            <tr>
              <td>Role</td>
              <td>{{$user->role->description}}</td>
            </tr>
            <tr>
              <td>Status Akun</td>
              <td>{{$user->status ==  1 ? "Aktif" : "Tidak Aktif"}}</td>
            </tr>
            @if (Auth::user()->isUser() && isset(Auth::user()->peminjam))
              <tr>
                <td>Organisasi</td>
                <td>{{$user->peminjam->nama_organisasi}}</td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>{{$user->peminjam->jabatan}}</td>
              </tr>
              <tr>
                <td>Kontak</td>
                <td>{{$user->peminjam->kontak}}</td>
              </tr>
            @endif
          </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning pull-left" data-toggle="modal" data-target="#modalCP">Ganti Password</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>


  <div class="modal fade" id="modalCP" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ganti Password</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => ['changePassword', \Auth::user()->id]]) !!}
              {!! Form::password('password', ['class' =>'form-control', 'id' => 'password', 'placeholder' => 'Password Baru (Minimal 6 Karakter)', 'onkeyup'=> 'pass(this)']) !!}
              {!! Form::password('password-conf', ['class' =>'form-control', 'id' => 'password-conf', 'placeholder' => 'Konfirmasi Password (Minimal 6 Karakter)', 'onkeyup'=> 'konf(this)']) !!}

        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" id='changePassword' class="btn btn-primary" disabled data-toggle="tooltip" title="Password konfirmasi tidak sesuai!">Simpan</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

    </div>
  </div>
    <!-- jQuery 3.1.1 -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset('js/icheck.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
    <script type="text/javascript">
      function pass(pass){
        var konf = document.getElementById('password-conf').value;
        var but = document.getElementById('changePassword');
        if(pass.value.length >= 6 && pass.value == konf){
            but.removeAttribute('disabled');
            but.removeAttribute('title');
        }else {
          but.setAttribute('disabled', 'true');
          but.setAttribute('title', 'Konfirmasi password tidak sesuai!');
        }
      }

      function konf(k){
        var p = document.getElementById('password').value;
        var but = document.getElementById('changePassword');
        if(k.value.length >= 6 && k.value == p){
            but.removeAttribute('disabled');
            but.removeAttribute('title');
        }else {
          but.setAttribute('disabled', 'true');
          but.setAttribute('title', 'Konfirmasi password tidak sesuai!');
        }
      }
    </script>
    @yield('scripts')
</body>
</html>
