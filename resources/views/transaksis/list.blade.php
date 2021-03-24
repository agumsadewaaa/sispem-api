@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Daftar Peminjaman
        </h1>
    </section>
    <div class="content">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

      @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('transaksis.list_table')
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
      $('#mypinjam-table').DataTable();
    </script>

    @foreach ($transaksis as $key => $transaksi)
      <!-- Modal -->
        <div class="modal fade" id="konfirmasi-{{$transaksi->id}}" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Konfirmasi Peminjaman {{$transaksi->peminjam->user->name}} | {{$transaksi->ruangan->nama_ruangan}}</h4>
              </div>
              <form class="form-horizontal" action="{{ route('pesanKonfirmasis.store')}}" method="post">
                {{ csrf_field() }}
              <div class="modal-body">
                  <input type="hidden" name="transaksi_id" value="{{$transaksi->id}}">
                  @if (Auth::user()->isWr())
                    <input type="hidden" name="target" value="0">
                  @elseif (Auth::user()->isKbsd())
                    <input type="hidden" name="target" value="1">
                  @elseif (Auth::user()->isKbu())
                    <input type="hidden" name="target" value="2">
                  @elseif (Auth::user()->isKsbrt())
                    <input type="hidden" name="target" value="3">
                  @endif
                  <textarea rows="5" name="pesan" value="" placeholder="Pesan Konfirmasi" class="form-control"></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" value = {{true}} name="terima" class="btn btn-primary">Terima</button>
                <button type="submit" value = {{true}} name="tolak" class="btn btn-danger pull-left">Tolak</button>
              </div>
            </form>
            </div>

          </div>
        </div>
    @endforeach
@endsection
