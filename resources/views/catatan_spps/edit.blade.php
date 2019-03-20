@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catatan Spp
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
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
@endsection