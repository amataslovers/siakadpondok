@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tahun Ajaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tahunAjaran, ['route' => ['tahunAjarans.update', $tahunAjaran->ID_TAHUN_AJARAN], 'method' => 'patch']) !!}

                        @include('tahun_ajarans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection