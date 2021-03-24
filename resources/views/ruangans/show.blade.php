@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ruangan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('ruangans.show_fields')
                    <a href="{!! route('ruangans.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
