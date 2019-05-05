@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Nilai Karakter Murid</h1>
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('nilaiKarakters.create') !!}">Add New</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @can('nilai-karakter-create')
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
        @endcan
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
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nisMurid', name: 'nisMurid'},
                { data: 'namaMurid', name: 'namaMurid'},
                { data: 'kelasMurid', name: 'kelasMurid'},
                { data: 'semester', name: 'semester', orderable: false, searchable: false  },
                { data: 'IJIN', name: 'IJIN', orderable: false, searchable: false  },
                { data: 'SAKIT', name: 'SAKIT', orderable: false, searchable: false  },
                { data: 'ALFA', name: 'ALFA', orderable: false, searchable: false  },
                { data: 'AKHLAQ', name: 'AKHLAQ', orderable: false, searchable: false  },
                { data: 'KEBERSIHAN', name: 'KEBERSIHAN', orderable: false, searchable: false  },
                { data: 'KERAJINAN', name: 'KERAJINAN', orderable: false, searchable: false  },
                { data: 'KETEKUNAN', name: 'KETEKUNAN', orderable: false, searchable: false  },
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
                this.api().columns([1,2]).every(function () {
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