<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Peminjaman Ruangan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <h3 class="text-center">Laporan Kritik dan Saran {{$periode ? "Periode ".$periode : "Semua Periode"}}</h3>
    <br><br>
    @if ($ruangan)
      <table>
        <tr>
          <td width="120px">Ruangan</td>
          <td>: {{ \App\Models\Ruangan::find($ruangan)->nama_ruangan }}</td>
        </tr>
      </table>
      <br>
    @endif
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">NIP/NIM</th>
          <th class="text-center">Organisasi</th>
          <th class="text-center">Ruangan</th>
          <th class="text-center">Peminjaman</th>
          <th class="text-center">Keluhan</th>
          <th class="text-center">Saran</th>
        </tr>
      </thead>
      <tbody>
      @php
        $no = 1;
      @endphp
      @foreach ($transaksis as $key => $value)
        <tr>
          <td class="text-center">{{ $no++ }}</td>
          <td class="text-center">{{ $value->peminjam->user->nip_nim}}</td>
          <td class="text-center">{{ $value->peminjam->nama_organisasi}}</td>
          <td class="text-center">{{ $value->ruangan->nama_ruangan}}</td>
          <td class="text-center">{{ $value->tanggal_mulai->format('d/m/Y')}} - {{$value->tanggal_selesai->format('d/m/Y')}}</td>
          <td class="text-center">{{ $value->pengaduan->keluhan}}</td>
          <td class="text-center">{{ $value->pengaduan->saran}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
  </body>
</html>
