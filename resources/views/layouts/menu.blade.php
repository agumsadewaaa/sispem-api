<li class="">

    <a href="#profil" data-toggle="modal" data-target="#myModal"><i class="fa fa-circle text-success"></i><span>{{ Auth::user()->name }}</span></a>

</li>
<hr>
<li class="{{ Request::is('/') ? 'active' : '' }}">
    <a href="{!! route('home') !!}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
@if (\Auth::user()->isAdmin())
  <li class="{{ Request::is('akuns*') ? 'active' : '' }}">
      <a href="{!! route('akuns.index') !!}"><i class="fa fa-users"></i><span>Akun</span></a>
  </li>


<li class="{{ Request::is('penjagas*') ? 'active' : '' }}">
    <a href="{!! route('penjagas.index') !!}"><i class="fa fa-shield"></i><span>Penjaga</span></a>
</li>

<li class="{{ Request::is('ruangans*') ? 'active' : '' }}">
    <a href="{!! route('ruangans.index') !!}"><i class="fa fa-building-o"></i><span>Ruangan</span></a>
</li>

{{-- <li class="{{ Request::is('') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-file-text"></i><span>Rekap</span></a>
</li> --}}

<li class="treeview {{ Request::is('rekapPeminjaman*') || Request::is('rekapPengaduan*') ? 'active' : '' }}"><a href="#"><i class="fa fa-file-text"></i><span>Rekap</span></a>
                <ul class="treeview-menu">
                  <li class="{{ Request::is('rekapPeminjaman*') ? 'active' : '' }}"><a href="{{route('rekapPeminjaman')}}"><i class="fa fa-circle-o"></i>Peminjaman</a></li>
                  <li class="{{ Request::is('rekapPengaduan*') ? 'active' : '' }}"><a href="{{route('rekapPengaduan')}}"><i class="fa fa-circle-o"></i><span>Pengaduan</span></a></li>
                </ul>
  </li>
@endif

@if (Auth::user()->isWr() || Auth::user()->isKbsd() || Auth::user()->isKbu() || Auth::user()->isKsbrt())
  <li class="{{ Request::is('transaksis/listSemua') ? 'active' : '' }}">
      <a href="{!! route('listSemua') !!}"><i class="fa fa-exchange"></i><span>List Peminjaman</span></a>
  </li>
  <li class="{{ Request::is('kritikSaran') ? 'active' : '' }}">
      <a href="{!! route('listPengaduan') !!}"><i class="fa fa-comments"></i><span>Kritik dan Saran</span></a>
  </li>
@endif

@if (Auth::user()->isUser())
  <li class="{{ Request::is('transaksis*') ? 'active' : '' }}">
      <a href="{!! route('peminjams.transaksis.index', [!isset(Auth::user()->peminjam)  ? 0 : Auth::user()->peminjam->id]) !!}"><i class="fa fa-exchange"></i><span>Ruangan</span></a>
  </li>

  <li class="{{ Request::is('/peminjaman') ? 'active' : '' }}">
      <a href="{{ route('peminjams.transaksis.show', [!isset(Auth::user()->peminjam) ? 0 : Auth::user()->peminjam->id, !isset(Auth::user()->peminjam) ? 0 : Auth::user()->peminjam->id]) }}"><i class="fa fa-table"></i><span>Peminjaman Saya</span></a>
  </li>

  <li class="{{ Request::is('/panduan') ? 'active' : '' }}">
      <a href="{{ route('panduan') }}"><i class="fa fa-list"></i><span>Panduan</span></a>
  </li>
@endif
{{--
<li class="{{ Request::is('transaksis*') ? 'active' : '' }}">
    <a href="{!! route('transaksis.index') !!}"><i class="fa fa-edit"></i><span>Transaksis</span></a>
</li>

<li class="{{ Request::is('pengaduans*') ? 'active' : '' }}">
    <a href="{!! route('pengaduans.index') !!}"><i class="fa fa-edit"></i><span>Pengaduans</span></a>
</li> --}}
