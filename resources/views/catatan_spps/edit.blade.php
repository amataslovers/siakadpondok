@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catatan Spp
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="row">
           <div class="col-md-9">
               <div class="box box-primary">
                   <div class="box-body">
                       <div class="row">
                           {!! Form::model($catatanSpp, ['route' => ['catatanSpps.update', $catatanSpp->ID_CATATAN_SPP], 'method' => 'patch']) !!}
        
                                @include('catatan_spps.fields')
        
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
            $('.form-select2').select2({
                width : '100%'
            });

            $('#BULAN').datepicker({
                autoclose : true,
                minViewMode: 1,
                format: 'mm'
            });

            $('#TANGGAL_BAYAR').datepicker({
                autoclose : true,
                format: 'dd/mm/yyyy'
            });
        });

    </script>
@endsection