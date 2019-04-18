@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keluarga Murid
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        {!! Form::model($keluargaMurid, ['route' => ['keluargaMurids.update', $keluargaMurid->ID_KELUARGA_MURID], 'method' => 'patch']) !!}
        
                                @include('keluarga_murids.fields')
        
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.form-select2').select2({
                width : '100%'
            });

            $('.tanggal').datepicker({
               autoclose : true,
               format: 'dd/mm/yyyy'
            });
        });
    </script>
@endsection