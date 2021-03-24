<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ruangan->id !!}</p>
</div>

<!-- Nama Ruangan Field -->
<div class="form-group">
    {!! Form::label('nama_ruangan', 'Nama Ruangan:') !!}
    <p>{!! $ruangan->nama_ruangan !!}</p>
</div>

<!-- Kapasitas Field -->
<div class="form-group">
    {!! Form::label('kapasitas', 'Kapasitas:') !!}
    <p>{!! $ruangan->kapasitas !!}</p>
</div>

<!-- Penjaga Id Field -->
<div class="form-group">
    {!! Form::label('penjaga_id', 'Penjaga Id:') !!}
    <p>{!! $ruangan->penjaga_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $ruangan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $ruangan->updated_at !!}</p>
</div>

