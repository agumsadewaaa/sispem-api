@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Rekap Kritik & Saran {{$periode ? "Periode ".$periode : "Semua Periode"}}</h1>
        <br><br>
        <form action="" method="get">
              <div class="col-lg-2">
                <select class="form-control" id="periode" name="periode">
                  @foreach ($periodes as $key => $value)
                    <option value="{{$key}}" {{$periode == $key ? 'selected' : ''}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-lg-2">
                <select class="form-control" id="ruangan" name="ruangan">
                  @foreach ($ruangans as $key => $value)
                    <option value="{{$key}}" {{$ruangan == $key ? 'selected' : ''}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>

                  <div class="form-group" >
                  <button id="buttonCari" type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i> Tampilkan</button>
                  </div>
                  </form>

                  {{ Form::open(['route' => 'laporanPengaduan', 'method' => 'POST', 'target' => '_blank'])}}
                  {{ Form::hidden('transaksis', $transaksis) }}
                  {{ Form::hidden('periode', $periode) }}
                  {{ Form::hidden('ruangan', $ruangan) }}
                    <div class="form-group" >
                        {{ Form::submit('Download', ['class' => 'btn btn-danger pull-left'])}}
                    </div>
                  {{ Form::close() }}
    </section>
    <div class="content">
      <br><br>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              <table class="table table-bordered table-striped" id="peminjaman-{{$periode}}">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIP/NIM</th>
                    <th>Organisasi</th>
                    <th>Ruangan</th>
                    <th>Peminjaman</th>
                    <th>Keluhan</th>
                    <th>Saran</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($transaksis as $key => $value)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $value->peminjam->user->nip_nim}}</td>
                      <td>{{ $value->peminjam->nama_organisasi}}</td>
                      <td>{{ $value->ruangan->nama_ruangan}}</td>
                      <td>{{ $value->tanggal_mulai->format('d/m/Y')}}-{{$value->tanggal_selesai->format('d/m/Y')}}</td>
                      <td>{{ $value->pengaduan->keluhan}}</td>
                      <td>{{ $value->pengaduan->saran}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>

    <script type="text/javascript">
      $('#peminjaman-{{$periode}}').DataTable();
    </script>
@endsection
