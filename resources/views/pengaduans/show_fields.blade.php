<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pengaduan->id !!}</p>
</div>

<!-- Transaksi Id Field -->
<div class="form-group">
    {!! Form::label('transaksi_id', 'Transaksi Id:') !!}
    <p>{!! $pengaduan->transaksi_id !!}</p>
</div>

<!-- Keluhan Field -->
<div class="form-group">
    {!! Form::label('keluhan', 'Keluhan:') !!}
    <p>{!! $pengaduan->keluhan !!}</p>
</div>

<!-- Saran Field -->
<div class="form-group">
    {!! Form::label('saran', 'Saran:') !!}
    <p>{!! $pengaduan->saran !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pengaduan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pengaduan->updated_at !!}</p>
</div>

