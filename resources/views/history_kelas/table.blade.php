@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%'], true) !!} --}}

<table class="table table-responsive table-hover table-bordered" id="historyKelas-table" style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Angkatan</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tfoot>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Angkatan</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th width="100px">Action</th>
            </tr>
    </tfoot>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        
        $('#historyKelas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('historyKelas.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'NIS', name: 'NIS' },
                { data: 'murid.NAMA', name: 'murid.NAMA' },
                { data: 'namaKelas', name: 'namaKelas' },
                { data: 'kelas.TAHUN_ANGKATAN', name: 'kelas.TAHUN_ANGKATAN' },
                { data: 'semester.SEMESTER', name: 'semester.SEMESTER', searchable: false },
                { data: 'semester.tahun_ajaran.NAMA', name: 'semester.tahun_ajaran.NAMA' },
                { data: 'action', name: 'history_kelas.action', orderable: false, searchable: false}

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