@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tenaga Umum
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('tenaga_umums.show_fields')
                    <a href="{!! route('tenagaUmums.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
