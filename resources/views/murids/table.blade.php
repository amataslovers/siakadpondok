@section('css')
    @include('layouts.datatables_css')
    <style type="text/css">
        div.container {
            width: 80%;
        }
    </style>
@endsection

{{-- {!! $dataTable->table(['width' => '100%'], true) !!} --}}

<table class="table table-responsive table-hover table-bordered" id="murids-table"  style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tfoot>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Angkatan</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
    </tfoot>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        var cekUrl = {!! json_encode(request()->get('status')) !!};

        if (cekUrl == null) {
            var url = '{!! route('murids.index') !!}'; 
        }else{
            var url = '{!! url('murids?status=0') !!}'; 
        }
        $('#murids-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'NIS', name: 'NIS' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'TEMPAT_LAHIR', name: 'TEMPAT_LAHIR' },
                { data: 'TANGGAL_LAHIR', name: 'TANGGAL_LAHIR' },
                { data: 'ANGKATAN', name: 'ANGKATAN' },
                { data: 'STATUS_AKTIF', name: 'STATUS_AKTIF' },
                { data: 'action', name: 'murids.action', orderable: false, searchable: false}

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
                this.api().columns([1,2,3,4,5]).every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                        column.search(val ? val : '', true, false).draw();
                    });
                });
            }
        });
    </script>
@endsection