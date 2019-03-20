@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pengampu
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pengampus.store']) !!}

                        @include('pengampus.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.form-select2').select2({
               width : '100%',
            });
        });
    </script>
@endsection