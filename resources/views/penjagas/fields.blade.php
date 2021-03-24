<!-- Nama Penjaga Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_penjaga', 'Nama Penjaga:') !!}
    {!! Form::text('nama_penjaga', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Handphone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nomor_handphone', 'Nomor Handphone:') !!}
    {!! Form::text('nomor_handphone', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('penjagas.index') !!}" class="btn btn-default">Cancel</a>
</div>
