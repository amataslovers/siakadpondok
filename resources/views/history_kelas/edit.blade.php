@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            History Kelas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($historyKelas, ['route' => ['historyKelas.update', $historyKelas->ID_HISTORY_KELAS], 'method' => 'patch']) !!}

                        @include('history_kelas.fields')

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
                width : '100%'
            });
        });
    </script>
@endsection