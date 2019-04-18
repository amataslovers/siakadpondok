@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Murid
            <a href="{!! route('murids.index') !!}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
        </h1>
        <br>
    </section>
    @include('murids.show_fields')
    
@endsection
