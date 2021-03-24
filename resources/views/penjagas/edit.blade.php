@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penjaga
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penjaga, ['route' => ['penjagas.update', $penjaga->id], 'method' => 'patch']) !!}

                        @include('penjagas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection