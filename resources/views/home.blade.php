@extends('layouts.app')

@section('content')
  <section class="content-header">
      {{-- <h1 class="pull-left">Ruangans</h1>
      <h1 class="pull-right">

      </h1> --}}
  </section>
  <div class="content">
      <div class="clearfix"></div>
      @php
        // dd(session());
      @endphp
      @if (session()->has('tidak'))
        <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> 404!</h4>
                {!! session()->get('tidak') !!}

        </div>
      @endif
      @include('flash::message')
      @php
        session()->pull('tidak');
      @endphp

      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h2>Selamat datang <strong>{{Auth::user()->name}} ({{Auth::user()->role->description}})
            </strong></h2>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (Auth::user()->isUser())
              <h4>Untuk panduan peminjaman klik <a href="{{route('panduan')}}">disini</a></h4>
            @endif
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
  </div>
@endsection
