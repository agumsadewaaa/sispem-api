<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $peminjam->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $peminjam->user_id !!}</p>
</div>

<!-- Nama Organisasi Field -->
<div class="form-group">
    {!! Form::label('nama_organisasi', 'Nama Organisasi:') !!}
    <p>{!! $peminjam->nama_organisasi !!}</p>
</div>

<!-- Jabatan Field -->
<div class="form-group">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    <p>{!! $peminjam->jabatan !!}</p>
</div>

<!-- Kontak Field -->
<div class="form-group">
    {!! Form::label('kontak', 'Kontak:') !!}
    <p>{!! $peminjam->kontak !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $peminjam->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $peminjam->updated_at !!}</p>
</div>

