@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mata Pelajaran
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body">
                        {!! Form::open(['route' => 'mataPelajarans.store']) !!}
    
                            @include('mata_pelajarans.fields')
    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
