@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keluarga Murid
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($keluargaMurid, ['route' => ['keluargaMurids.update', $keluargaMurid->ID_KELUARGA_MURID], 'method' => 'patch']) !!}

                        @include('keluarga_murids.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection