@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Nilai Karakters</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('nilaiKarakters.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <a data-toggle="collapse" href="#collapse1">
                <div class="box-header with-border">
                    <h3 class="box-title">Form isi nilai</h3>
                </div>
            </a>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="box-body">
                        @include('nilai_karakters.fields_nilai')
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('nilai_karakters.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js_client')

    <script type="text/javascript">

        $(document).ready(function(){
            $('.form-select2').select2({
                width : '100%'
            });
        });

        $('#nilais-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('nilaiKarakters.index') !!}',
            columns: [
                { data: 'ID_HISTORY_KELAS', name: 'ID_HISTORY_KELAS'},
                { data: 'IJIN', name: 'IJIN' },
                { data: 'SAKIT', name: 'SAKIT' },
                { data: 'ALFA', name: 'ALFA' },
                { data: 'AKHLAQ', name: 'AKHLAQ' },
                { data: 'KEBERSIHAN', name: 'KEBERSIHAN' },
                { data: 'KERAJINAN', name: 'KERAJINAN' },
                { data: 'action', name: 'nilai_akademik.action', orderable: false, searchable: false}

            ],
            dom: 'lBfrtip',
            scrollX: true,
            "buttons": [
               {
                    extend: 'colvis',
                    postfixButtons: ['colvisRestore'],
               }
            ],
            language: {
                buttons: {
                    colvis: 'Ganti Kolom'
                }
            }
        });
    </script>
@endsection