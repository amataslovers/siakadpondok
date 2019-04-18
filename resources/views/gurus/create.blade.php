@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Guru
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
        
                    <div class="box-body">
                        <div class="row">
                            {!! Form::open(['route' => 'gurus.store', 'files' => true]) !!}
        
                                @include('gurus.fields')
        
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#TANGGAL_LAHIR').datepicker({
               autoclose : true,
               format: 'dd/mm/yyyy'
            });
        });
    </script>
@endsection