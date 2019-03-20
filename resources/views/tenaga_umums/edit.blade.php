@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tenaga Umum
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tenagaUmum, ['route' => ['tenagaUmums.update', $tenagaUmum->ID_TENAGA_UMUM], 'method' => 'patch']) !!}

                        @include('tenaga_umums.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection