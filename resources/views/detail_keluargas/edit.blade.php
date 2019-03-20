@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Keluarga
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailKeluarga, ['route' => ['detailKeluargas.update', $detailKeluarga->ID_DETAIL_KELUARGA], 'method' => 'patch']) !!}

                        @include('detail_keluargas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection