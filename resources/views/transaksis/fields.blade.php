
    {!! Form::hidden('peminjam_id', Auth::user()->peminjam->id) !!}

<!-- Tanggal Mulai Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tanggal_mulai', 'Tanggal Mulai:') !!}
    {!! Form::date('tanggal_mulai', request()->mulai, ['class' => 'form-control', 'id' => 'val-mul']) !!}
    <p style="color: red" id="per-mul" hidden>Anda hanya bisa melakukan peminjaman untuk setidak 3 hari dari sekarang</p>
</div>


<!-- Tanggal Selesai Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tanggal_selesai', 'Tanggal Selesai:') !!}
    {!! Form::date('tanggal_selesai', request()->akhir, ['class' => 'form-control', 'id' => 'val-sel']) !!}
    <p style="color: red" id="per-sel" hidden>Tanggal selesai harus lebih besar atau sama dengan tanggal mulai</p>
</div>

<!-- Nama Acara Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_acara', 'Nama Acara:') !!}
    {!! Form::text('nama_acara', null, ['class' => 'form-control']) !!}
</div>

<!-- Penanggung Jawab Field -->
<div class="form-group col-sm-12">
    {!! Form::label('penanggung_jawab', 'Penanggung Jawab:') !!}
    {!! Form::text('penanggung_jawab', null, ['class' => 'form-control']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kontak', 'Kontak:') !!}
    {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
</div>

    {!! Form::hidden('ruangan_id', request()->ruangan) !!}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('peminjams.transaksis.index', [Auth::user()->peminjam->id]) !!}" class="btn btn-default">Cancel</a>
</div>

<script type="text/javascript">
  var valmul = document.getElementById('val-mul');
  var valsel = document.getElementById('val-sel');
  var permul = document.getElementById('per-mul');
  var persel = document.getElementById('per-sel');
  var mulai = new Date(valmul.value);
  var sekarang = new Date();
  sekarang = new Date(sekarang.setDate(sekarang.getDate()+ 1));
  if( !(mulai >= sekarang) ){
    valmul.value = null;
    permul.removeAttribute('hidden');
  }else{
    permul.setAttribute('hidden', true);
    if(valsel.value == ''){
      valsel.value = valmul.value;
    }
  }
  if( !(new Date(valsel.value) >= new Date(valmul.value)) && valsel.value != '' ){
    valsel.value = null;
    persel.removeAttribute('hidden');
  }else{
    persel.setAttribute('hidden', true);
  }
  valmul.addEventListener('change', ()=>{
    var mulai = new Date(valmul.value);
    var sekarang = new Date();
    sekarang = new Date(sekarang.setDate(sekarang.getDate()+ 3));
    if( !(mulai >= sekarang) ){
      valmul.value = null;
      permul.removeAttribute('hidden');
    }else{
      if(valsel.value == ''){
        valsel.value = valmul.value;
      }

      permul.setAttribute('hidden', true);
    }
  });

  valsel.addEventListener('change', ()=>{
    if( !(new Date(valsel.value) >= new Date(valmul.value)) ){
      valsel.value = valmul.value;
      persel.removeAttribute('hidden');
    }else{
      persel.setAttribute('hidden', true);
    }
  });

</script>
