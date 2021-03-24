@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ $jenis=='semua' ? "Semua Ruangan" : "Ruangan ".$jenis}} pada {{$akhir ? date('d/m/Y',strtotime($mulai)).'-'.date('d/m/Y',strtotime($akhir)) : date('d/m/Y',strtotime($mulai))}}</h1>
        <br>
        <br>
        <p style="color: red;" >*) Wajib diisi</p>
        <p style="color: orange;" >**) Kosongkan tanggal rentang akhir jika hanya mencari pada spesifik tanggal tertentu</p>
        <form action="" method="get">

              <div class="col-lg-2">
                <select class="form-control" id="jenis" name="jenis" onchange="jenisChange(this)">
                  <option value="semua" {{$jenis == 'semua' ? 'selected': ''}}>Semua</option>
                  <option value="tersedia" {{$jenis == 'tersedia' ? 'selected': ''}}>Tersedia</option>
                  <option value="telah dipinjam" {{$jenis == 'telah dipinjam' ? 'selected': ''}}>Telah Dipinjam</option>
                </select>
              </div>
              <div class="col-lg-2" id="awaldiv">
                <input placeholder="*Tanggal Rentang Awal" type="text" value="{{$mulai}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="mulai" name="mulai"/>
              </div>
              <div class="col-lg-2" id="akhirdiv">
                <input placeholder="**Tanggal Rentang Akhir" type="text" value="{{$akhir}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="akhir" name="akhir"/>
                <p style="color: red" id='perbes' hidden>Harus besar dari rentang awal</p>
              </div>

                  <div class="form-group" >
                  <button id="buttonCari" type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i> Tampilkan</button>
                  </div>
                  </form>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
@php
  // dd($ruangans)
@endphp
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('transaksis.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>

    <script type="text/javascript">
      $('#ruangans-table').DataTable();
      var buttonCari = document.getElementById('buttonCari');
      function jenisChange(j){
        var inmulai = document.getElementById('mulai');
        buttonCari.setAttribute('disabled', true);
          if(inmulai.value != ''){
            buttonCari.removeAttribute('disabled')};
      }

      var inmulai = document.getElementById('mulai');
      inmulai.addEventListener('change', ()=>{
        // console.log(inmulai.value);
        if(inmulai.value != ''){
          buttonCari.removeAttribute('disabled');
        }else{
          buttonCari.setAttribute('disabled', true);
        }
      });

      var akhir = document.getElementById('akhir');
      var perbes = document.getElementById('perbes');
      akhir.addEventListener('change', ()=>{
        // console.log(new Date(inmulai.value) >= new Date(akhir.value));
        if( !(new Date(inmulai.value) < new Date(akhir.value)) ){
          akhir.value = null;
          perbes.removeAttribute('hidden');
        }else{
          perbes.setAttribute('hidden', true);
        }
      });
    </script>
@endsection
