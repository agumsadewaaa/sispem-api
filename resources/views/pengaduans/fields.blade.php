<!-- Transaksi Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_id', 'Transaksi Id:') !!}
    {!! Form::text('transaksi_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Keluhan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keluhan', 'Keluhan:') !!}
    {!! Form::text('keluhan', null, ['class' => 'form-control']) !!}
</div>

<!-- Saran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saran', 'Saran:') !!}
    {!! Form::text('saran', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pengaduans.index') !!}" class="btn btn-default">Cancel</a>
</div>
