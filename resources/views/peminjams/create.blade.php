@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kelengkapan Data Anda
        </h1>
    </section>
    <div class="content">
      <div class="clearfix"></div>
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['users.peminjams.store', \Auth::user()->id]]) !!}

                        @include('peminjams.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
