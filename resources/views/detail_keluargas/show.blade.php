@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Keluarga
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('detail_keluargas.show_fields')
                    <a href="{!! route('detailKeluargas.index') !!}" class="btn btn-default"><i class="fa fa-arrow-left"> </i> Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
