<table class="table table-responsive" id="mypinjam-table">
    <thead>
        <tr>
          <th>#</th>
        <th>Nama Ruangan</th>
        <th>Kontak Penjaga</th>
        <th>WR II/KBUSD</th>
        <th>KBU</th>
        <th>KSBRT</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
        Carbon::setLocale('id');
        $request = request();
        $st = [];
      @endphp
    @foreach($transaksis as $transaksi)
        <tr>
            <td>{{$no++}}</td>
            <td><a href="{{ route('detailTransaksi', $transaksi->id)}} ">{!! $transaksi->ruangan->nama_ruangan !!}</a></td>
            {{-- <td>{!! $transaksi->tanggal_mulai->format('d/m/Y') !!}</td>
            <td>{!! $transaksi->tanggal_selesai->format('d/m/Y') !!}</td> --}}
            <td>{!! $transaksi->ruangan->penjaga->nomor_handphone !!}</td>
            @php
              $stat = false;
            @endphp
            <td>
              @if ($transaksi->wr != null
               || $transaksi->kbsd != null)
               @php
                 $ok = $transaksi->wr ?: $transaksi->kbsd;
               @endphp
                @if ($ok->status == 1)
                  <button class="btn btn-success loading">Diterima</button>
                @else
                  @php
                    $stat = $transaksi->wr ? "wr" : "kbsd";
                  @endphp
                  <button class="btn btn-danger loading">Ditolak</button>
                @endif
              @else
                <button class="btn btn-warning loading">Belum direspon</button>
              @endif
            </td>
            <td>
              @if ($stat)
                <button class="btn btn-danger loading">Ditolak</button>
              @else
                @if ($transaksi->kbu != null)
                  @if ($transaksi->kbu->status == 1)
                    <button class="btn btn-success loading">Diterima</button>
                  @else
                    @php
                      $stat = 'kbu';
                    @endphp
                    <button class="btn btn-danger loading">Ditolak</button>
                  @endif
                @else
                  <button class="btn btn-warning loading">Belum direspon</button>
                @endif
              @endif
            </td>
            <td>
              @if ($stat)
                <button class="btn btn-danger loading">Ditolak</button>
              @else
                @if ($transaksi->ksbrt != null)
                  @if ($transaksi->ksbrt->status == 1)
                    <button class="btn btn-success loading">Diterima</button>
                  @else
                    @php
                      $stat = 'ksbrt';
                    @endphp
                    <button class="btn btn-danger loading">Ditolak</button>
                  @endif
                @else
                  <button class="btn btn-warning loading">Belum direspon</button>
                @endif
              @endif

            </td>
            <td>

              @if ($transaksi->ksbrt != null && $transaksi->ksbrt->status == 1)
                @if ($transaksi->pengaduan != null)
                  @php

                    $berhasil[$transaksi->id] = false;
                  @endphp
                @else
                  @php
                  // dd($transaksi->pengaduan);
                    $berhasil[$transaksi->id] = true;
                  @endphp
                  <a href="{{route('cetak', [$transaksi->id])}}" class="btn btn-default" target="_blank">Cetak</a>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#selesai-{{$transaksi->id}}">Selesai</button>
                @endif

              @else
                @php
                  $berhasil[$transaksi->id] = false;
                @endphp
                @if ($stat)
                  <button class="btn btn-default" data-toggle="modal" data-target="#alasan-{{$transaksi->id}}">Alasan</button>
                @else
                  {!! Form::open(['route' => ['peminjams.transaksis.destroy', Auth::user()->peminjam->id, $transaksi->id], 'method' => 'delete']) !!}
                  {!! Form::button('Batalkan', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                  {!! Form::close() !!}
                @endif
              @endif
            </td>
        </tr>
        @php
          $st[$transaksi->id] = $stat;
          // dd($berhasil);
        @endphp
    @endforeach
    </tbody>
</table>
@foreach ($transaksis as $key => $value)
  @if ($st[$value->id])
    <div class="modal fade" id="alasan-{{$value->id}}" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Alasan Penolakan</h4>
          </div>
          @php
            $penolak = $st[$value->id];
          @endphp
          <div class="modal-body">
            <p>{{$value->$penolak->pesan}}</p>
          </div>
        </div>

      </div>
    </div>
  @endif

  @if ($berhasil[$value->id])
    <div class="modal fade" id="selesai-{{$value->id}}" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Kritik dan Saran</h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => ['peminjams.transaksis.pengaduans.store', Auth::user()->peminjam->id, $value->id]]) !!}

              {!! Form::hidden('transaksi_id', $value->id) !!}
              {!! Form::text('keluhan', null, ['class'=>'form-control', 'placeholder'=>'Keluhan']) !!}
              <br>
              {!! Form::text('saran', null, ['class'=>'form-control', 'placeholder'=>'Saran']) !!}
              <br>
              {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
          </div>
        </div>

      </div>
    </div>
  @endif
@endforeach
