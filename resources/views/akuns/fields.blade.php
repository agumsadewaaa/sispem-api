<!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nama:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Organisasi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nip_nim', 'NIP/NIM:') !!}
    {!! Form::text('nip_nim', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-12">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('akuns.index') !!}" class="btn btn-default">Cancel</a>
</div>
