<table class="table table-responsive" id="ruangans-table">
    <thead>
        <tr>
          <th>#</th>
            <th>Nama Ruangan</th>
        <th>Kapasitas</th>
        <th>Penjaga</th>
        <th>Kontak Penjaga</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
        Carbon::setLocale('id');
      @endphp
    @foreach($ruangans as $ruangan)
        <tr>
            <td>{{$no++}}</td>
            <td>{!! $ruangan->nama_ruangan !!}</td>
            <td>{!! $ruangan->kapasitas !!}</td>
            <td>{!! $ruangan->penjaga->nama_penjaga !!}</td>
            <td>{!! $ruangan->penjaga->nomor_handphone !!}</td>
            @php
            $transRuangans = $ruangan->transaksis->filter(
              function($tran) use ($mulai, $akhir){
                if($mulai != null){
                  if($akhir != null){
                    return  $tran->periode == Date('Y') &&
                            $tran->status = 0 &&
                            ($tran->tanggal_mulai->format('Y-m-d') >= $mulai &&
                            $tran->tanggal_mulai->format('Y-m-d') <= $akhir )||
                            ($tran->tanggal_selesai->format('Y-m-d') <= $akhir &&
                            $tran->tanggal_selesai->format('Y-m-d') >= $mulai);
                  }
                  return  $tran->periode == Date('Y') &&
                          $tran->status = 0 &&
                          $tran->tanggal_mulai->lt(\Carbon\Carbon::parse($mulai)) && $tran->tanggal_selesai->gt(\Carbon\Carbon::parse($mulai));

                }
                return  $tran->periode == Date('Y') && $tran->status = 0;
              }
            );
            @endphp
            <td> {{ !\App\Models\Ruangan::isTerpakai($ruangan->id, $mulai, $akhir ?: $mulai) ? "Tersedia" : "Sedang dipinjam" }} </td>
            <td>
              @if (!\App\Models\Ruangan::isTerpakai($ruangan->id, $mulai, $akhir ?: $mulai))
                <a href="{{ route('peminjams.transaksis.create', [Auth::user()->peminjam->id, 'ruangan' => $ruangan->id, 'mulai' => $mulai, 'akhir' => $akhir])}}" class="btn btn-primary">Pinjam</button>
              @else
                <button class="btn btn-default" data-toggle="modal" data-target="#pinjaman-{{$ruangan->id}}">Lihat</button>
              @endif
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
@foreach ($ruangans as $key => $ruangan)
  @if (!$ruangan->transaksis->isEmpty())
    <div class="modal fade" id="pinjaman-{{$ruangan->id}}" role="dialog">
      <div class="modal-dialog" style="width:85vw;">
            <div class="modal-content">
              <div class="modal-header">
                @php
                  $m = new DateTime($mulai);
                  $a = new DateTime($akhir);
                @endphp
                <h4 class="modal-title">Peminjaman {{$ruangan->nama_ruangan}} {{ $akhir ? "antara ". $m->format('d/m/Y')." - ".$a->format('d/m/Y') : "pada ".$m->format('d/m/Y')}}</h4>
              </div>
              @php

                $trans = $ruangan->transaksis->filter(
                  function($tran) use ($mulai, $akhir){
                    if($mulai != null){
                      if($akhir != null){
                        return  $tran->periode == Date('Y') &&
                                ($tran->tanggal_mulai->format('Y-m-d') >= $mulai &&
                                $tran->tanggal_mulai->format('Y-m-d') <= $akhir )||
                                ($tran->tanggal_selesai->format('Y-m-d') <= $akhir &&
                                $tran->tanggal_selesai->format('Y-m-d') >= $mulai);
                      }
                      return  $tran->periode == Date('Y') &&
                              $tran->tanggal_mulai->lt(\Carbon\Carbon::parse($mulai)) && $tran->tanggal_selesai->gt(\Carbon\Carbon::parse($mulai))
                              // $tran->tanggal_mulai->format('Y-m-d') <= $mulai &&
                              // $tran->tanggal_selesai->format('Y-m-d') >= $mulai;
                              || $tran->tanggal_mulai->format('Y-m-d') == $mulai ||
                              $tran->tanggal_selesai->format('Y-m-d') == $mulai;

                    }
                    return  $tran->periode == Date('Y');
                  }
                );
                $status = ["Ditolak", "Telah Dikonfimasi"];
              @endphp
              <div class="modal-body" >
                <table class="table table-bordered table-striped" id="table-{{$ruangan->id}}">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Peminjam</th>
                      <th>Organisai</th>
                      <th>Acara</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Kontak</th>
                      <th>Konfirmasi WR II</th>
                      <th>Konfirmasi KBSD</th>
                      <th>Konfirmasi KSBU</th>
                    </tr>
                  </thead>
                  @php
                    $no =1
                  @endphp
                  <tbody>
                    @foreach ($trans as $key => $value)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$value->peminjam->user->name}}</td>
                        <td>{{$value->peminjam->nama_organisasi}}</td>
                        <td>{{$value->nama_acara}}</td>
                        <td>{{$value->tanggal_mulai->formatLocalized('%d %B %Y')}}</td>
                        <td>{{$value->tanggal_selesai->formatLocalized('%d %B %Y')}}</td>
                        <td>{{ $value->kontak }}</td>
                        <td>{{ $value->konfirmasi_wr_id != null ? $status[$value->wr->status] : "Belum Direspon"}}</td>
                        <td>{{ $value->konfirmasi_kbsd_id != null ? $status[$value->kbsd->status] : "Belum Direspon"}}</td>
                        <td>{{ $value->konfirmasi_kbu_id != null ? $status[$value->kbu->status] : "Belum Direspon"}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $('#table-{{$ruangan->id}}').DataTable();
      </script>
  @endif
@endforeach
