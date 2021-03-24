@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transaksi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transaksi, ['route' => ['transaksis.update', $transaksi->id], 'method' => 'patch']) !!}

                        @include('transaksis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection