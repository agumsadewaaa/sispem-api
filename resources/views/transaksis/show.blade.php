@extends('layouts.app')

@section('content')
  <style media="screen">
  .loading,.loading>td,.loading>th,.nav li.loading.active>a,.pagination li.loading,.pagination>li.active.loading>a,.pager>li.loading>a{
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
  background-size: 40px 40px;
    animation: 2s linear 0s normal none infinite progress-bar-stripes;
    -webkit-animation: progress-bar-stripes 2s linear infinite;
    }
    .btn.btn-default.loading,input[type="text"].loading,select.loading,textarea.loading,.well.loading,.list-group-item.loading,.pagination>li.active.loading>a,.pager>li.loading>a{
    background-image: linear-gradient(45deg, rgba(235, 235, 235, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(235, 235, 235, 0.15) 50%, rgba(235, 235, 235, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
    }


  </style>
    <section class="content-header">
        <h1>
            Transaksi
        </h1>
    </section>
    <div class="content">
      @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('transaksis.show_table')
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
      $('#mypinjam-table').DataTable();
    </script>
@endsection
