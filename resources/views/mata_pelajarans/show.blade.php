@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mata Pelajaran
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('mata_pelajarans.show_fields')
                    <a href="{!! route('mataPelajarans.index') !!}" class="btn btn-default"><i class="fa fa-arrow-left"> </i> Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
