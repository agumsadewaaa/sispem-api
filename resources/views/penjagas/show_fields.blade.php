<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $penjaga->id !!}</p>
</div>

<!-- Nama Penjaga Field -->
<div class="form-group">
    {!! Form::label('nama_penjaga', 'Nama Penjaga:') !!}
    <p>{!! $penjaga->nama_penjaga !!}</p>
</div>

<!-- Nomor Handphone Field -->
<div class="form-group">
    {!! Form::label('nomor_handphone', 'Nomor Handphone:') !!}
    <p>{!! $penjaga->nomor_handphone !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $penjaga->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $penjaga->updated_at !!}</p>
</div>

