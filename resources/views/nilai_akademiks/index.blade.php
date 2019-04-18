@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Nilai Akademik Murid</h1>
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('nilaiAkademiks.create') !!}">Add New</a>
        </h1> --}}
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
                        @include('nilai_akademiks.fields_nilai')
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('nilai_akademiks.table')
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
            ajax: '{!! route('nilaiAkademiks.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'NIS', name: 'NIS' },
                { data: 'namaMurid', name: 'namaMurid' },
                { data: 'namaMapel', name: 'namaMapel' },
                { data: 'tingkatKelas', name: 'tingkatKelas', orderable: false, searchable: false },
                { data: 'semester.SEMESTER', name: 'semester.SEMESTER', searchable: false },
                { data: 'NILAI_UTS', name: 'NILAI_UTS', orderable: false, searchable: false },
                { data: 'NILAI_UAS', name: 'NILAI_UAS', orderable: false, searchable: false },
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
                },
                search: 'Cari:',
                zeroRecords: 'Data tidak ditemukan',
                paginate: {
                    first: 'Awal',
                    last: 'Terakhir',
                    next: 'Selanjutnya',
                    previous: 'Sebelumnya'
                },
            },
            initComplete: function () {
                this.api().columns([1,2,3]).every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }
        });
    </script>
@endsection