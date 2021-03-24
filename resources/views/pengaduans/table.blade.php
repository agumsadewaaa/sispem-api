<table class="table table-responsive" id="pengaduans-table">
    <thead>
        <tr>
        <th>#</th>
        <th>Peminjam</th>
        <th>Ruangan</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
      @php
        $no =1;
      @endphp
    @foreach($pengaduans as $pengaduan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $pengaduan->peminjam->user->name !!}</td>
            <td>{!! $pengaduan->ruangan->nama_ruangan !!}</td>
            <td>{!! $pengaduan->tanggal_mulai->format('d/m/Y') !!}</td>
            <td>{!! $pengaduan->tanggal_selesai->format('d/m/Y') !!}</td>
            <td>
              <button type="button" name="button" class= "btn btn-primary" data-toggle="modal" data-target="#kritik-{{$pengaduan->id}}">Lihat</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@foreach ($pengaduans as $key => $value)
  <div class="modal fade" id="kritik-{{$value->id}}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Kritik dan Saran {{$value->ruangan->nama_ruangan}} | {{$value->peminjam->user->name}}</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>Kritik</th>
                <th>Saran</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$value->pengaduan->keluhan}}</td>
                <td>{{$value->pengaduan->saran}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
@endforeach
