@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nilai Karakter
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nilaiKarakter, ['route' => ['nilaiKarakters.update', $nilaiKarakter->ID_NILAI_KARAKTER], 'method' => 'patch']) !!}

                        @include('nilai_karakters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection