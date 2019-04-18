@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kelas <a href="{!! route('kelas.index') !!}" class="btn btn-default"><i class="fa fa-arrow-left"> </i> Back</a>
        </h1>
    </section>
    <div class="content">
        <div class="row">
            @include('kelas.show_fields')
            
        </div>
    </div>
@endsection
