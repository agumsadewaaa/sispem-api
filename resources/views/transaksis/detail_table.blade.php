
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Ruangan</label>
    {!! $transaksi->ruangan->nama_ruangan !!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Tanggal Mulai</label>
    {!! $transaksi->tanggal_mulai->format('d/m/Y')!!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Tanggal Selesai</label>
    {!! $transaksi->tanggal_selesai->format('d/m/Y')!!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Penjaga Ruangan</label>
    {!! $transaksi->ruangan->penjaga->nama_penjaga !!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Peminjam</label>
    {!! $transaksi->peminjam->user->name !!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Organisasi Peminjam</label>
    {!! $transaksi->peminjam->nama_organisasi !!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Kontak Peminjam</label>
    {!! $transaksi->peminjam->kontak !!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">PJ Peminjaman</label>
    {!! $transaksi->penanggung_jawab !!}
</div>
<div class="form-group">
  <label for="nip" class="col-md-3 form-control-label">Kontak PJ</label>
    {!! $transaksi->kontak !!}
</div>
