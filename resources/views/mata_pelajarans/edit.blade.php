@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mata Pelajaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mataPelajaran, ['route' => ['mataPelajarans.update', $mataPelajaran->ID_MATA_PELAJARAN], 'method' => 'patch']) !!}

                        @include('mata_pelajarans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection