
{!! Form::hidden('user_id', $user->id) !!}

<!-- Nama Organisasi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_organisasi', 'Nama Organisasi:') !!}
    {!! Form::text('nama_organisasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Field -->
@php
  $jabs = ["Mahasiswa" => "Mahasiswa", "Dekanat"=>"Dekanat", "Umum"=>"Umum"];
@endphp
<div class="form-group col-sm-12">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    {!! Form::select('jabatan', $jabs, null, ['class' => 'form-control']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kontak', 'Kontak:') !!}
    {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.peminjams.index', [\Auth::user()->id]) !!}" class="btn btn-default">Cancel</a>
</div>
