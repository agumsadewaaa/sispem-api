<!-- Nama Ruangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_ruangan', 'Nama Ruangan:') !!}
    {!! Form::text('nama_ruangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kapasitas Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kapasitas', 'Kapasitas:') !!}
    {!! Form::number('kapasitas', null, ['class' => 'form-control']) !!}
</div>

<!-- Penjaga Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('penjaga_id', 'Penjaga:') !!}
    {!! Form::select('penjaga_id', $penjagas, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('need_wr_conf', 'Butuh Konfirmasi WR:') !!}
    {!! Form::select('need_wr_conf', ['Tidak', 'Iya'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ruangans.index') !!}" class="btn btn-default">Cancel</a>
</div>
