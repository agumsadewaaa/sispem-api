@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pengaduan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pengaduan, ['route' => ['pengaduans.update', $pengaduan->id], 'method' => 'patch']) !!}

                        @include('pengaduans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection