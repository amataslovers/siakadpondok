@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Penghubung Keluarga Murid</h1>
        <h1 class="pull-right">
            @can('detail-keluarga-create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('detailKeluargas.create') !!}">Add New</a>
           @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('detail_keluargas.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

