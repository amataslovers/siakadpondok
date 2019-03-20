@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nilai Akademik
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nilaiAkademik, ['route' => ['nilaiAkademiks.update', $nilaiAkademik->ID_NILAI], 'method' => 'patch']) !!}

                        @include('nilai_akademiks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection