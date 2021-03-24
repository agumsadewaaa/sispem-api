<table class="table table-responsive" id="mypinjam-table">
    <thead>
        <tr>
          <th>#</th>
        <th>Peminjam</th>
        <th>Organisasi</th>
        <th>PJ</th>
        <th>Acara</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
        Carbon::setLocale('id');
        $request = request();
      @endphp
    @foreach($transaksis as $transaksi)
        <tr>
            <td>{{$no++}}</td>
            <td>{!! $transaksi->peminjam->user->name !!}</td>
            <td>{{ $transaksi->peminjam->nama_organisasi }}</td>
            <td>{{ $transaksi->penanggung_jawab }}</td>
            <td><a href="{{ route('detailTransaksi', $transaksi->id)}}">{{ $transaksi->nama_acara }}</a></td>
            <td>{{ $transaksi->tanggal_mulai->format('d/m/Y') }}</td>
            <td>{{ $transaksi->tanggal_selesai->format('d/m/Y') }}</td>
            <td>
              @php
                $status = $transaksi->status;
              @endphp
              @if ($status == 3)
                <button class="btn btn-danger">Ditolak</button>
              @elseif ($status == 4)
                <button class="btn btn-danger">Ditolak Sistem</button>
              @else
                @if (Auth::user()->isWr() || Auth::user()->isKbsd())
                  @php
                    // dd($transaksis->last()->wr)
                  @endphp
                  @if (($statwr = $transaksi->wr) != null || ($stkbsd = $transaksi->kbsd) != null)
                    @if (($statwr ? $statwr->status : 0) == 1 || ($stkbsd ? $stkbsd->status : 0) == 1)
                      <button class="btn btn-success">Diterima</button>
                    @else
                      <button class="btn btn-danger">Ditolak</button>
                    @endif
                  @else
                    <button class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi-{{$transaksi->id}}">Respon</button>
                  @endif

                @elseif (Auth::user()->isKbu())
                  @if (($statwr = $transaksi->wr) != null || ($stkbsd = $transaksi->kbsd) != null)
                    @if (($statwr ? $statwr->status : 0) == 0 && ($stkbsd ? $stkbsd->status : 0) == 0)
                      <button class="btn btn-danger">Ditolak WR II/KBSUD</button>
                    @else
                      @if ($transaksi->kbu != null)
                        @if ($transaksi->kbu->status == 1)
                          <button class="btn btn-success">Diterima</button>
                        @else
                          <button class="btn btn-danger">Ditolak</button>
                        @endif
                      @else
                        <button class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi-{{$transaksi->id}}">Respon</button>
                      @endif

                    @endif
                  @else
                    <button class="btn btn-danger" disabled>Belum Dikonfirmasi WR II/KBSUD</button>
                  @endif

                @elseif (Auth::user()->isKsbrt())
                  @if (($statwr = $transaksi->wr) != null || ($stkbsd = $transaksi->kbsd) != null)
                    @if (($statwr ? $statwr->status : 0) == 0 && ($stkbsd ? $stkbsd->status : 0) == 0)
                      <button class="btn btn-danger">Ditolak WR II/KBUSD</button>
                    @else
                      @if ($transaksi->kbu != null)
                        @if ($transaksi->kbu->status == 1)
                          @if ($transaksi->ksbrt != null)
                            @if ($transaksi->ksbrt->status == 1)
                              <button class="btn btn-success">Diterima</button>
                            @else
                              <button class="btn btn-danger">Ditolak</button>
                            @endif
                          @else
                            <button class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi-{{$transaksi->id}}">Respon</button>
                          @endif
                        @else
                          <button class="btn btn-danger">Ditolak KBU</button>
                        @endif
                      @else
                        <button class="btn btn-danger" disabled>Belum Dikonfirmasi KBU</button>
                      @endif
                    @endif
                  @else
                    <button class="btn btn-danger" disabled>Belum Dikonfirmasi WR II/KBUSD</button>
                  @endif
                @endif
              @endif
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
