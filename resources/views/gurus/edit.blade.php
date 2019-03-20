@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Guru
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($guru, ['route' => ['gurus.update', $guru->NIP_GURU], 'method' => 'patch', 'files' => true]) !!}

                        @include('gurus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection