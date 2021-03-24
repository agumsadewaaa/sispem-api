@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Peminjam
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($peminjam, ['route' => ['peminjams.update', $peminjam->id], 'method' => 'patch']) !!}

                        @include('peminjams.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection