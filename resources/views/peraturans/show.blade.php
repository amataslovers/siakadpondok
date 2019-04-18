@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Peraturan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('peraturans.show_fields')
                    <a href="{!! route('peraturans.index') !!}" class="btn btn-default"><i class="fa fa-arrow-left"> </i> Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
