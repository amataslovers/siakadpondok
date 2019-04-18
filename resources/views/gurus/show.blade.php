@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Guru
            <a href="{!! route('gurus.index') !!}" class="btn btn-default"><i class="fa fa-arrow-left"> </i> Back</a>
        </h1>
    </section>
    <div class="content">
        {{-- <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px"> --}}
                    @include('gurus.show_fields')
                {{-- </div>
            </div>
        </div> --}}
    </div>
@endsection
