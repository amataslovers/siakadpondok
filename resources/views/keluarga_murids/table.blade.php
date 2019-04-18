@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%'], true) !!} --}}

<table class="table table-responsive table-hover table-bordered" id="keluargaMurids-table" style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Hubungan</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>No Telepo</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tfoot>
            
    </tfoot>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        
        $('#keluargaMurids-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('keluargaMurids.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'jenis_keluarga.NAMA', name: 'jenis_keluarga.NAMA' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'TEMPAT_LAHIR', name: 'TEMPAT_LAHIR' },
                { data: 'TANGGAL_LAHIR', name: 'TANGGAL_LAHIR', orderable: false, searchable: false },
                { data: 'NOTELP', name: 'NOTELP', orderable: false, searchable: false },
                { data: 'action', name: 'keluarga_murids.action', orderable: false, searchable: false}

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
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                        column.search(val ? val : '', true, false).draw();
                    });
                });
            }
        });
    </script>
@endsection