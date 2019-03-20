@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kelas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kelas, ['route' => ['kelas.update', $kelas->ID_KELAS], 'method' => 'patch']) !!}

                        @include('kelas.fields')

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

        $('#TAHUN_ANGKATAN').datepicker({
            autoclose : true,
            minViewMode: 2,
            format: 'yyyy'
        });
    </script>
@endsection