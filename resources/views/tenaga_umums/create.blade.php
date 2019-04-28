@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tenaga Umum
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
        
                    <div class="box-body">
                        <div class="row">
                            {!! Form::open(['route' => 'tenagaUmums.store', 'files' => true]) !!}
        
                                @include('tenaga_umums.fields')
        
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#TANGGAL_LAHIR').datepicker({
                autoclose : true,
                format: 'dd/mm/yyyy'
            });
        });
    </script>
@endsection