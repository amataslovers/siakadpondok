@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tingkat
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
        
                    <div class="box-body">
                        <div class="row">
                            {!! Form::open(['route' => 'tingkats.store']) !!}
        
                                @include('tingkats.fields')
        
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
