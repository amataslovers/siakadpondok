@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kelas
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('kelas.show_fields')
                    <a href="{!! route('kelas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
