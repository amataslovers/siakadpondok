@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sanksi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sanksi, ['route' => ['sanksis.update', $sanksi->ID_SANKSI], 'method' => 'patch']) !!}

                        @include('sanksis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection