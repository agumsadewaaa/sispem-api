@extends('layouts.app')

@section('content')
    <section class="content-header">
        {{-- <h1 class="pull-left">Panduan</h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h2>Panduan Peminjaman</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ol style="font-size: 20px">
                <li>Peminjam mencari ruangan yang akan dipinjam berdasarkan tanggal (jika sudah dipinjam pada tanggal tersebut bisa melihat siapa yang meminjam)
                <ul>
                  <li>Jika melihat ketersediaan ruangan pada speifik tanggal tertentu, hanya isi tanggal rentang awal saja</li>
                  <li>Jika melihat ketersediaan ruangan pada rentang tanggal tertentu, isi tanggal rentang awal dan akhir</li>
                </ul>
                </li>
                <li>Peminjam hanya bisa meminjam ruangan setidaknya 3 hari sebelum tanggal pemakaian ruangan dimulai</li>
                <li>Silahkan tungguk konfirmasi dari WR II, KBSD, dan KSBU</li>
                <li>Jika WR II, KBSD, dan KSBU sudah menyetujui peminjaman, maka bisa mencetak surat peminjaman</li>
                <li>Bawa <i>print out</i> surat peminjaman ke KSBU untuk ditandatangani</li>
                <li>Setelah selesai pemakaian ruangan, WAJIB mengkonfirmasi selesai pemakaian, dengan menekan tombol selesai. Kritik dan saran harap di isi.</li>
                <li style="color: red">Jika tidak mengkonfirmasi selesai pemakaian ruangan setelah jatuh tempo tanggal selesai yang disimpan dalam sistem, maka sistem otomatis blokir akun peminjam</li>
              </ol>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
@endsection
